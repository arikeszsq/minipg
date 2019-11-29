<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\Coupon;
use app\models\UserCard;
use app\models\UserCoupon;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

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
        $user_coupon = UserCoupon::find()->where(['user_id' => $user_id, 'coupon_id' => $coupon_id])->one();
        if ($user_coupon && $user_coupon->stay_num > 0) {
            $has_coupon = 1;
        } else {
            $has_coupon = 0;
        }
        if ($user_card) {
            $is_vip = 1;
        } else {
            $is_vip = 0;
        }
        return [
            'code' => 200,
            'msg' => '成功获取',
            'coupon' => $coupon,
            'is_vip' => $is_vip,
            'has_coupon' => $has_coupon
        ];
    }

    /**
     * 领取优惠券
     * @return array
     */
    public function actionGet()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        if (!isset($inputs['coupon_id']) || empty($inputs['coupon_id'])) {
            return [
                'code' => 101,
                'msg' => '优惠券id不可以为空',
            ];
        }
        $coupon_id = $inputs['coupon_id'];
        $coupon = Coupon::find()->where(['id' => $coupon_id])->one();
        if (!$coupon) {
            return [
                'code' => 111,
                'msg' => '优惠券不存在',
            ];
        }
        $user_card = UserCard::find()->where(['user_id' => $user_id, 'card_id' => $coupon->card_id])->one();
        if (!$user_card) {
            return [
                'code' => 110,
                'msg' => '请先购买会员卡',
            ];
        } elseif ($user_card->stay_coupon_num <= 0) {
            return [
                'code' => 102,
                'msg' => '您的领取机会已用完',
            ];
        }
        if ($coupon->stay_num <= 0) {
            return [
                'code' => 103,
                'msg' => '优惠券已经没有库存',
            ];
        }
        $version = $coupon->version;
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $coupon->version += 1;
            $coupon->already_sale_num += 1;
            $coupon->stay_num -= 1;
            $coupon->save();
            $user_coupon = UserCoupon::find()->where(['user_id' => $user_id, 'coupon_id' => $coupon_id])->one();
            if (!$user_coupon) {
                $user_coupon = new UserCoupon();
                $user_coupon->user_id = $user_id;
                $user_coupon->username = $user->child_name;
                $user_coupon->coupon_id = $coupon_id;
                $user_coupon->coupon_name = $coupon->name;
                $user_coupon->status = 1;
                $user_coupon->everyone_max_num = $coupon->everyone_max_num;
                $user_coupon->already_get_num = 1;
                $user_coupon->stay_get_num = $coupon->everyone_max_num - 1;
                $user_coupon->stay_num += 1;
            } else {
                if ($user_coupon->stay_get_num <= 0) {
                    return [
                        'code' => 104,
                        'msg' => '您已没有领取优惠券机会',
                    ];
                }
                $user_coupon->already_get_num += 1;
                $user_coupon->stay_get_num -= 1;
                $user_coupon->stay_num += 1;
            }
            $user_coupon->save();
            $user_card->already_coupon_num += 1;
            $user_card->stay_coupon_num -= 1;
            $user_card->save();
            if ($coupon->version != $version + 1) {
                throw new Exception('更新失败，表已经更新，请重新更新');
            }
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            return [
                'code' => 105,
                'msg' => '没有库存，领取失败',
            ];
        }
        return [
            'code' => 200,
            'msg' => '领取成功',
        ];
    }

    /**
     * 待领取优惠券列表
     * @return array
     */
    public function actionLists()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $cards = Card::find()
            ->where(['<', 'valid_time_start', date('Y-m-d H:i:s', time())])
            ->andWhere(['>', 'valid_time_end', date('Y-m-d H:i:s', time())])
            ->all();
        $count = count($cards);
        if ($count < 1) {
            return [
                'code' => 101,
                'msg' => '会员卡不存在',
            ];
        } elseif ($count > 1) {
            return [
                'code' => 102,
                'msg' => '会员卡重复存在',
            ];
        }
        $card = $cards[0];
        $user_card = UserCard::find()
            ->where(['user_id' => $user_id, 'card_id' => $card->id])
            ->one();
        $coupons_query = Coupon::find();
        $total_count = $coupons_query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $coupons = $coupons_query
            ->where(['card_id' => $card->id])
            ->with([
                'userCoupon' => function ($query) use ($user_id) {
                    $query->andWhere(['user_id' => $user_id]);
                },])
            ->offset($offset)
            ->limit($per_page)
            ->asArray()
            ->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'user_card' => $user_card,
                'total_count' => $total_count,
                'total_page' => $total_page,
                'coupons' => $coupons,
            ],
        ];


    }
}