<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use app\filters\auth\HttpBearerAuth;
use app\components\JsonOutputHelper;

/**
 * ChannelprogrammController implements the CRUD actions for ChannelProgramm model.
 */
class ChannelprogrammController extends ActiveController
{

    public $modelClass = 'app\models\Channelprogramm';

    public function checkAccess($action, $model = null, $params = []) {

    }

    public function actions() {
        $actions = parent::actions();
        unset($actions['create'], $actions['update'], $actions['index'], $actions['view'], $actions['delete']);
        return $actions;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter'] = [
           'class' => \yii\filters\RateLimiter::className(),
        ];

        $behaviors['rateLimiter']['enableRateLimitHeaders'] = true;
        return $behaviors;
    }

    public function FindChannels($package, $category, $switchHD){
        $channels = \app\models\Channel::find();

        if(!empty($switchHD)){
            $switchHD = filter_var($switchHD, FILTER_VALIDATE_BOOLEAN);
            $channels = $channels->andWhere(['=','channel.isHD',$switchHD]);
        }

        if(!empty($package)) {
            $channels = $channels->innerJoin('channel_channelpackage', 'channel.id = channel_channelpackage.channel_id')
                ->andWhere(['=','channel_channelpackage.package_id',$package]);
        }

        if(!empty($category)) {
            $channels = $channels->innerJoin('channel_channelcategory', 'channel.id = channel_channelcategory.channel_id')
                ->andWhere(['=', 'channel_channelcategory.category_id', $category]);
        }

        $channels = $channels->limit(100)->asArray()->all();
        return $channels;
    }

    /**
     * Lists all ChannelProgramm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = \Yii::$app->request->get();

        try{
            $offset = (!empty($params['offset'])) ? intval($params['offset']) : 0;
            $date =  (!empty($params['date'])) ? $params['date'] : '2018-09-01';
            $package = (!empty($params['package'])) ? $params['package'] : 0;
            $genre = (!empty($params['genre'])) ? $params['genre'] : 0;
            $category = (!empty($params['category'])) ? $params['category'] : 0;
            $switchHD = (!empty($params['switchHD'])) ? $params['switchHD'] : 0;
            $search = (!empty($params['search'])) ? $params['search'] : '';

            $channels = $this->FindChannels($package, $category, $switchHD);

            $programms = \app\models\ChannelProgramm::find()
                ->select('channel_programm.id, channel_programm.channel_id, channel_programm.programm_id,
                    channel_programm.date, channel_programm.time, channel_programm.HD, programm.name as name')
                ->innerJoin('channel', 'channel.id = channel_programm.channel_id')
                ->innerJoin('programm', 'programm.id = channel_programm.programm_id')
                ->andWhere(['=','channel_programm.date',$date]);

            if(!empty($search)){
                $programms = $programms->andWhere(['LIKE','programm.name',$search]);
            }

            if(!empty($genre)) {
                $programms = $programms->innerJoin('genre_programm', 'channel_programm.programm_id = genre_programm.programm_id')
                    ->andWhere(['=', 'genre_programm.genre_id', $genre]);
            }

            $programms = $programms->limit(100)->offset($offset)
                ->asArray()->all();

            return JsonOutputHelper::getResult(array('channels' => $channels, 'count' => count($programms), 'programms' => $programms));

        }
        catch(Exception $exception)
        {
            Yii::$app->response->statusCode = 422;
            return JsonOutputHelper::getError('Неверно указан параметр offset');
        }
    }

}
