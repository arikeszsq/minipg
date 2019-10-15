<?php

namespace app\modules\api\controllers;
class ProductController extends BaseController
{
    public function actionIndex()
    {
        $list = [
            1,3,4,4
        ];
        var_dump(json_encode($list));
    }

}