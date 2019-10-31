<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\Coupon;
use app\models\UserCard;
use Yii;

class CouponController extends BaseController
{
    /**
     * 优惠券详情
     * @return array
     */
    public function actionDetail()
    {
        $inputs = Yii::$app->request->post();
        $coupon_id = $inputs['coupon_id'];
        $coupon = Coupon::find()
            ->where(['id' => $coupon_id])
            ->with('business')
            ->asArray()
            ->one();
        return [
            'code' => 200,
            'msg' => '成功获取',
            'coupon' => $coupon,
        ];
    }
}