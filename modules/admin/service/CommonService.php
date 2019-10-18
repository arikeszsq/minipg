<?php


namespace app\modules\admin\service;


use app\models\Business;

class CommonService extends \yii\db\ActiveRecord
{
    public function getBusinessNameList()
    {
        $business = Business::find()->all();
        $data = [];
        foreach ($business as $v) {
            $data[$v->name] = $v->name;
        }
        return $data;
    }

    public function getBusinessId($name)
    {
        $business = Business::find()->where(['name' => $name])->one();
        if ($business) {
            $id = $business->id;
        }
        return $id ?? '';
    }
}