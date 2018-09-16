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

//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::className(),
//        ];
//
//
//
//        // remove authentication filter
//        $auth = $behaviors['authenticator'];
//        unset($behaviors['authenticator']);
//
//        // add CORS filter
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//            'cors' => ['Origin' => ['*']]];
//
//        // re-add authentication filter
//        $behaviors['authenticator'] = $auth;
//        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
//        $behaviors['authenticator']['except'] = ['options'];

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

    /**
     * Displays a single Genre model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

    }

    /**
     * Creates a new Genre model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

    }

    /**
     * Updates an existing Genre model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

    }

    /**
     * Deletes an existing Genre model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

    }

    /**
     * Finds the Genre model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Genre the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

    }
}
