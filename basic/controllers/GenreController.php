<?php

namespace app\controllers;

use http\Exception\BadQueryStringException;
use Yii;
use yii\rest\ActiveController;
use app\filters\auth\HttpBearerAuth;
use app\components\JsonOutputHelper;

/**
 * GenreController implements the CRUD actions for Genre model.
 */
class GenreController extends ActiveController
{

    public $modelClass = 'app\models\Genre';

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
        return $behaviors;
    }

    /**
     * Lists all Genre models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = \Yii::$app->request->get();

        try{
            $offset = (!empty($params['offset'])) ? intval($params['offset']) : 0;

            $me = \Yii::$app->user->identity;

            $genres = \app\models\Genre::find()->limit(20)->offset($offset)->all();
            return JsonOutputHelper::getResult($genres);

        }
        catch(Exception $exception)
        {
            Yii::$app->response->statusCode = 422;
            return JsonOutputHelper::getError('Неверно указан параметр offset');
        }
    }
}
