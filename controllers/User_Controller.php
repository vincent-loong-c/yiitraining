<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class User_Controller extends ActiveController
{
    public $modelClass = 'app\models\User_';

    public function actionView($id){
        return User_::findOne($id);    
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/user/login');
        }
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true;
    }

    public function behaviors(){
        $behaviors = parent::behaviors();

        // return [
        //     [
        //         'class' => \yii\filters\ContentNegotiator::className(),
        //         'only' => ['index', 'view'],
        //         'formats' => [
        //             'application/json' => \yii\web\Response::FORMAT_JSON,
        //         ],
        //     ],
        // ];

        return $behaviors;
    }

    public function prepareDataProvider()
    {
        // prepare and return a data provider for the "index" action
    }

    // public function behaviors()
    // {
    //     return [
    //         [
    //             'class' => \yii\filters\ContentNegotiator::className(),
    //             'only' => ['index', 'view','create','update','delete'],
    //             'formats' => [
    //                 'application/json' => \yii\web\Response::FORMAT_JSON,
    //             ],
    //         ],
    //     ];
    // }
}

?>