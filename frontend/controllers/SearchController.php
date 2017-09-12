<?php
/**
 * Created by PhpStorm.
 * User: Ekilei
 * Date: 12.09.2017
 * Time: 15:12
 */

namespace frontend\controllers;

use skeeks\cms\models\CmsContentElement;
use Yii;
use yii\web\Controller;

class SearchController extends Controller
{



    public function actionAutocomplete()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $term = Yii::$app->request->get('term');

        $products = CmsContentElement::find()->where(['like','name',$term])->all();

        $arr = [];
        if($products)
        {
            /**
             * @var \skeeks\cms\models\CmsContentElement $model
             */
            foreach ($products as $model)
            {
                $shopProduct = \skeeks\cms\shop\models\ShopProduct::getInstanceByContentElement($model);
                $arr[] = $model->name.' - '. \Yii::$app->money->convertAndFormat($shopProduct->baseProductPrice->money);
            }
        }

        return $arr;
    }

}

