<?php
/**
 * Created by PhpStorm.
 * User: xiedalie
 * Date: 2016/11/25
 * Time: 15:58
 */

namespace Home\Controller;


use Home\Model\WxBiz;
use Think\Controller;
use Vendor\Hiland\Utils\Web\NetHelper;

class FooController extends Controller
{
    public function index()
    {
        dump(1111111111);
    }

    public function wxbiz()
    {
        WxBiz::createQrcode(3, "oinMwxGi-Ok20PEf5lUn6TtPaQXg");
    }

    public function wximg()
    {
        $headimgurl= "http://wx.qlogo.cn/mmopen/Ib5852jAybibhPd6DV1FzXCgLicqMreYh8LTWtFje4ePscFDPl8KMc2jAo65z5IjNluaQBBwkIVS2oxX67eqFBaoRnjoesVAWL/0";
//        $data = NetHelper::get($headimgurl);
//        dump($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_URL, $headimgurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        $headimg = curl_exec($ch);
        curl_close($ch);
        dump($headimg);
    }
}