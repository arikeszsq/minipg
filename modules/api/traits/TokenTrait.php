<?php
namespace app\modules\api\traits;

use app\modules\api\services\MyCryptService as mCrypt;

trait TokenTrait
{
    /**
     * 加密
     */
    public function encrypt($value)
    {
        $mString = (new mCrypt())->encrypt($value);
        return $mString;
    }

    /**
     * 解密
     */
    public function decrypt($string)
    {
        return (new mCrypt())->decrypt($string);
    }

}