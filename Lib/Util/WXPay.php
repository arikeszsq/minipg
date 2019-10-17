<?php
/**
 * 微信支付
 */
namespace App\Util;

class WXPay
{
    private $config;

    /**
     * 参数初始化
     */
    public function __construct()
    {
        global $Pay_config;
        $this->config = $Pay_config['WeixinPay_app'];
    }

    //获取预支付订单--APP
    public function getPrePayOrder($order_type = "vip", $pay_info)
    {
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $key_name = $order_type . '_notifyurl';
        $notifyurl = $this->config[$key_name];
        $onoce_str = $this->getRandChar(32);
        $data["appid"] = $this->config["appid"];
        $data["body"] = $pay_info['body'];
        $data["mch_id"] = $this->config['mch_id'];
        $data["nonce_str"] = $onoce_str;
        $data["notify_url"] = $notifyurl;
        $data["out_trade_no"] = $pay_info['out_trade_no'];;
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["total_fee"] = $pay_info['total_fee'] * 100;//微信支付 1分是 1;
        $data["trade_type"] = "APP";
        $s = $this->getSign($data, false);
        $data["sign"] = $s;
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url);

        //将微信返回的结果xml转成数组
        return $this->xmlstr_to_array($response);
    }

    //获取预支付订单--公众号、小程序
    public function getPrePayOrder2($notify_url, $out_trade_no, $body, $total_fee, $openid)
    {
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $notify_url = $this->config["notify_url"];
        $onoce_str = $this->getRandChar(32);
        $data["appid"] = $this->config["appid"];
        $data["body"] = $body;
        $data["mch_id"] = $this->config['mch_id'];
        $data["nonce_str"] = $onoce_str;
        $data["notify_url"] = $notify_url;
        $data["out_trade_no"] = $out_trade_no;
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["total_fee"] = $total_fee;
        $data["trade_type"] = "JSAPI";
        $data["openid"] = $openid;
        $s = $this->getSign($data, false);
        $data["sign"] = $s;
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url);
        //将微信返回的结果xml转成数组
        return $this->xmlstr_to_array($response);
    }

    /**
     * 企业付款
     * @param string $openid 调用【网页授权获取用户信息】接口获取到用户在该公众号下的Openid
     * @param float $totalFee 收款总费用 单位元
     * @param string $outTradeNo 唯一的订单号
     * @param string $orderName 订单名称
     * @param string $notifyUrl 支付结果通知url 不要有问号
     * @param string $timestamp 支付时间
     * @return string
     */
    public function createJsBizPackage($openid, $totalFee, $outTradeNo, $trueName = "")
    {
        $config = array(
            'mch_id' => $this->config["mch_id"],
            'appid' => $this->config["appid"],
            'key' => $this->config["api_key"],
        );
        $onoce_str = $this->getRandChar(32);
        $unified = array(
            'mch_appid' => $config['appid'],
            'mchid' => $config['mch_id'],
            'nonce_str' => $onoce_str,
            'openid' => $openid,
            'check_name' => 'NO_CHECK',        //校验用户姓名选项。NO_CHECK：不校验真实姓名，FORCE_CHECK：强校验真实姓名
            //'re_user_name'=>$trueName,                 //收款用户真实姓名（不支持给非实名用户打款）
            'partner_trade_no' => $outTradeNo,
            'spbill_create_ip' => '127.0.0.1',
            'amount' => intval($totalFee * 100),       //单位 转为分
            'desc' => '付款',            //企业付款操作说明信息
        );
        $unified['sign'] = $this->getSign($unified, false);
        $url = "https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers";
        $xml = $this->arrayToXml($unified);
        $response = $this->postXmlCurl($xml, $url, true);
        return $this->xmlstr_to_array($response);
    }

    //执行第二次签名，才能返回给客户端使用-JSAPI
    public function getOrder($prepayId)
    {
        $data["appid"] = $this->config["appid"];
        $data["noncestr"] = $this->getRandChar(32);;
        $data["package"] = "Sign=JSAPI";
        $data["partnerid"] = $this->config['mch_id'];
        $data["prepayid"] = $prepayId;
        $data["timestamp"] = time();
        $s = $this->getSign($data, false);
        $data["sign"] = $s;
        return $data;
    }

    //执行第二次签名，才能返回给客户端使用-APP
    public function getOrder3($prepayId)
    {
        $data["appid"] = $this->config["appid"];
        $data["noncestr"] = $this->getRandChar(32);;
        $data["package"] = "Sign=WXPay";
        $data["partnerid"] = $this->config['mch_id'];
        $data["prepayid"] = $prepayId;
        $data["timestamp"] = time();
        $s = $this->getSign2($data, false);
        $data["sign"] = $s;
        return $data;
    }

//执行第二次签名-小程序
    public function getOrder2($prepayId)
    {
        $data["appId"] = $this->config["appid"];
        $data["nonceStr"] = $this->getRandChar(32);;
        $data["package"] = "prepay_id=" . $prepayId;
        $data["signType"] = "MD5";
        $data["timeStamp"] = time();
        $s = $this->getSign2($data);
        $data["paySign"] = $s;
        return $data;
    }

    public function getsignkey()
    {
        $data["mch_id"] = $this->config['mch_id'];
        $data["nonce_str"] = $this->getRandChar(32);
        $data['sign'] = $this->getSign($data, false);
        $url = "https://apitest.mch.weixin.qq.com/sandboxnew/pay/getsignkey";
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url, true);
        return $this->xmlstr_to_array($response);
    }

    /*
        生成签名
    */
    function getSign($Obj)
    {
        foreach ($Obj as $k => $v) {
            $Parameters[strtolower($k)] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
//        echo "【string】 =".$String."</br>";
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . $this->config['api_key'];
//        echo "<textarea style='width: 50%; height: 150px;'>$String</textarea> <br />";
        //签名步骤三：MD5加密
        $result_ = strtoupper(md5($String));
        return $result_;
    }

    function getSign2($Obj)
    {
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap2($Parameters, false);
        // echo "【string】 =".$String."</br>";
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . $this->config['api_key'];
        //echo "<textarea style='width: 50%; height: 150px;'>$String</textarea> <br />";
        //签名步骤三：MD5加密
        $result_ = strtoupper(md5($String));
        return $result_;
    }

    //获取指定长度的随机字符串
    function getRandChar($length)
    {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }

    //数组转xml
    function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";

            } else
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
        }
        $xml .= "</xml>";
        return $xml;
    }

    //post https请求，CURLOPT_POSTFIELDS xml格式
    function postXmlCurl2($xml, $url, $second = 30)
    {
        //初始化curl
        $ch = curl_init();
        //超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if ($data) {
            curl_close($ch);
            return $data;
        } else {
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error" . "<br>";
            echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }

    function postXmlCurl($xml, $url, $useCert = false, $second = 30)
    {
        //初始化curl
        $ch = curl_init();
        //超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch, CURLOPT_URL, $url);


        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        if ($useCert == true) {
            //print_r(getcwd());die;
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLCERT, '/www/wwwroot/fujin/simplewind/Core/Library/Vendor/WeiXin/cert/apiclient_cert.pem');
            curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($ch, CURLOPT_SSLKEY, '/www/wwwroot/fujin/simplewind/Core/Library/Vendor/WeiXin/cert/apiclient_key.pem');
            curl_setopt($ch, CURLOPT_CAINFO, '/www/wwwroot/fujin/simplewind/Core/Library/Vendor/WeiXin/cert/cacert.pem');
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if ($data) {
            curl_close($ch);
            return $data;
        } else {
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error" . "<br>";
            echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }

    /*
        获取当前服务器的IP
    */
    function get_client_ip()
    {
        if ($_SERVER['REMOTE_ADDR']) {
            $cip = $_SERVER['REMOTE_ADDR'];
        } elseif (getenv("REMOTE_ADDR")) {
            $cip = getenv("REMOTE_ADDR");
        } elseif (getenv("HTTP_CLIENT_IP")) {
            $cip = getenv("HTTP_CLIENT_IP");
        } else {
            $cip = "unknown";
        }
        return $cip;
    }

    //将数组转成uri字符串
    function formatBizQueryParaMap($paraMap, $urlencode)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if ($urlencode) {
                $v = urlencode($v);
            }
            $buff .= strtolower($k) . "=" . $v . "&";
        }
        $reqPar = '';
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }

    function formatBizQueryParaMap2($paraMap, $urlencode)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if ($urlencode) {
                $v = urlencode($v);
            }
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar = '';
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }

    /**
     * xml转成数组
     */
    function xmlstr_to_array($xmlstr)
    {
        //$doc = new DOMDocument();
        $doc = new \DOMDocument('1.0', 'utf-8');
        $doc->loadXML($xmlstr);
        return $this->domnode_to_array($doc->documentElement);
    }

    function domnode_to_array($node)
    {
        $output = array();
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                for ($i = 0, $m = $node->childNodes->length; $i < $m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = $this->domnode_to_array($child);
                    if (isset($child->tagName)) {
                        $t = $child->tagName;
                        if (!isset($output[$t])) {
                            $output[$t] = array();
                        }
                        $output[$t][] = $v;
                    } elseif ($v) {
                        $output = (string)$v;
                    }
                }
                if (is_array($output)) {
                    if ($node->attributes->length) {
                        $a = array();
                        foreach ($node->attributes as $attrName => $attrNode) {
                            $a[$attrName] = (string)$attrNode->value;
                        }
                        $output['@attributes'] = $a;
                    }
                    foreach ($output as $t => $v) {
                        if (is_array($v) && count($v) == 1 && $t != '@attributes') {
                            $output[$t] = $v[0];
                        }
                    }
                }
                break;
        }
        return $output;
    }

}
