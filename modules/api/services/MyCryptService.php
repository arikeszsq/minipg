<?php


namespace app\modules\api\services;


class MyCryptService
{
    protected $secureKey = '405305c793179059f8fd52436876750c587d19ccfbbe2a643743d021dbdcd79c';

    public function encrypt($id){
        $id=serialize($id);
        $data['iv']=base64_encode(substr('fdakinel;injajdji',0,16));
        $data['value']=openssl_encrypt($id, 'AES-256-CBC',$this->secureKey,0,base64_decode($data['iv']));
        $encrypt=base64_encode(json_encode($data));
        return $encrypt;
    }


    public function decrypt($encrypt)
    {
        $encrypt = json_decode(base64_decode($encrypt), true);
        $iv = base64_decode($encrypt['iv']);
        $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $this->secureKey, 0, $iv);
        $id = unserialize($decrypt);
        if($id){
            return $id;
        }else{
            return 0;
        }
    }

}