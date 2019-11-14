<?php


namespace app\modules\api\controllers;


use app\models\Banner;
use Yii;

class BannerController extends BaseController
{
    public function actionLists()
    {
        Yii::$app->response->format = 'json';
        $banners = Banner::find()->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'banner' => $banners,
        ];
    }
}