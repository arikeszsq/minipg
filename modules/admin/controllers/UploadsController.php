<?php


namespace app\modules\admin\controllers;


use app\models\Upload;
use yii\helpers\Json;
use yii\web\Controller;

class UploadsController extends Controller
{
    public function actionIndex()
    {
        try {
            $model = new Upload();
            $info = $model->upImage();


            $info && is_array($info) ?
                exit(Json::htmlEncode($info)) :
                exit(Json::htmlEncode([
                    'code' => 1,
                    'msg' => 'error'
                ]));


        } catch (\Exception $e) {
            exit(Json::htmlEncode([
                'code' => 1,
                'msg' => $e->getMessage()
            ]));
        }
    }

}