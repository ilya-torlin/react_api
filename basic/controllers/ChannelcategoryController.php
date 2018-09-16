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
//
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

    /**
     * Displays a single Channelcategory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

    }

    /**
     * Creates a new Channelcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

    }

    /**
     * Updates an existing Channelcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

    }

    /**
     * Deletes an existing Channelcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

    }

    /**
     * Finds the Channelcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Channelcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

    }
}
