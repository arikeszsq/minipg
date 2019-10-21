<?php

namespace app\modules\api\services;


use app\models\UserInfo;
use app\modules\api\traits\TokenTrait;

class LoginService
{
    use TokenTrait;

    public function login($info)
    {
        $open_id = $info['openId'];
        $nick_name = $info['nickName'];
        $user_info = new UserInfo();
        $user_info->openid = $open_id;
        $user_info->username = $nick_name;
        $user_info->save();
        $user_id = $user_info->id;
        $token = $this->encrypt($user_id);
        return [
            'username' => $nick_name,
            'token' => $token
        ];
    }

}