<?php
/**
 * Created by PhpStorm.
 * User: Ekilei
 * Date: 12.09.2017
 * Time: 15:12
 */

namespace frontend\controllers;


use yii\web\Controller;

class SearchController extends Controller
{



    public function actionAutocomplete()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return ['USA','RUS'];
    }

}

