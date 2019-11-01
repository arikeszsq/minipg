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
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        $coupon_id = $inputs['coupon_id'];
        $coupon = Coupon::find()
            ->where(['id' => $coupon_id])
            ->with('business')
            ->asArray()
            ->one();
        $card_id = $coupon['card_id'];
        $user_card = UserCard::find()->where(['user_id' => $user_id])->andWhere(['card_id' => $card_id])->one();
        if ($user_card) {
            $is_vip = 1;
        } else {
            $is_vip = 0;
        }
        return [
            'code' => 200,
            'msg' => '成功获取',
            'coupon' => $coupon,
            'is_vip' => $is_vip
        ];
    }
}