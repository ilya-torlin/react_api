<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use app\filters\auth\HttpBearerAuth;
use app\components\JsonOutputHelper;

/**
 * ChannelcategoryController implements the CRUD actions for Channelcategory model.
 */
class ChannelcategoryController extends ActiveController
{
    public $modelClass = 'app\models\Channelcategory';

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
        return $behaviors;
    }

    /**
     * Lists all Channelcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = \Yii::$app->request->get();

        try{
            $offset = (!empty($params['offset'])) ? intval($params['offset']) : 0;

            $me = \Yii::$app->user->identity;

            $channelscats = \app\models\Channelcategory::find()->limit(20)->offset($offset)->all();
            return JsonOutputHelper::getResult($channelscats);

        }
        catch(Exception $exception)
        {
            Yii::$app->response->statusCode = 422;
            return JsonOutputHelper::getError('Неверно указан параметр offset');
        }
    }
}
