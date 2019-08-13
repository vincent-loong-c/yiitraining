<?php

//This controller is for demo purpose
namespace app\controllers;

use yii\web\Controller;

class DemoController extends Controller
{
    public function actionTesttt(){
        $this->redirect('https://code.tutsplus.com/tutorials/how-to-program-with-yii2-exploring-mvc-forms-and-layouts--cms-22682');
    }
}
