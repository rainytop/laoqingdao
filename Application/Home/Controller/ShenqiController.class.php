<?php
/**
 * Created by PhpStorm.
 * User: xiedalie
 * Date: 2016/12/4
 * Time: 6:49
 */

namespace Home\Controller;


use Org\Util\Date;
use Think\Controller;
use Vendor\Hiland\Utils\Data\DateHelper;
use Vendor\Hiland\Utils\Data\ReflectionHelper;

class ShenqiController extends Controller
{
    public function gate()
    {
        $resourcePath = __ROOT__ . "/upload/shenqi/gate/";
        $this->assign("resourcePath", $resourcePath);
        $this->display();
    }

    public function qiuhun()
    {
        if (IS_POST) {
            $name = I("targetName");
            $this->redirect("qiuhun", "name=$name");
        } else {
            $name = I("name");

            if (empty($name)) {
                $this->display("index");
            } else {
                $this->assign("name", $name);

                $date = DateHelper::format(null, "Y-m-d");
                $this->assign("date", $date);

                $resourcePath = __ROOT__ . "/upload/shenqi/qiuhun/";
                $this->assign("resourcePath", $resourcePath);

                $this->display();
            }
        }
    }

    public function biaobai()
    {
        if (IS_POST) {
            $name = I("targetName");
            $this->redirect("biaobai", "name=$name");
        } else {
            $name = I("name");

            if (empty($name)) {
                $this->display("index");
            } else {
                $this->assign("name", $name);

                $date = DateHelper::format(null, "Y-m-d");
                $this->assign("date", $date);

                $lastDate= DateHelper::addInterval(null,"d",-1);
                $lastDate= DateHelper::format($lastDate,"m月d日");
                $this->assign("lastDate", $lastDate);

                $resourcePath = __ROOT__ . "/upload/shenqi/biaobai/";
                $this->assign("resourcePath", $resourcePath);

                $this->display();
            }
        }
    }

    public function more()
    {
        $this->display("more");
    }

    public function baoye()
    {
        $this->assign("title", "美女包夜");
        $this->detail("baoye");
    }

    public function daihe()
    {
        $this->assign("title", "滴滴代喝");
        $this->detail("daihe");
    }

    public function mingxingliaotian(){
        $this->assign("secondUsing", "true");
        $this->assign("secondTitle", "请输入聊天的明星姓名");

        $this->assign("title", "明星聊天");
        $this->detail("mingxingliaotian");
    }

    private function detail($methodName)
    {
        if (IS_POST) {
            $targetName = I("targetName");
            if (empty($targetName)) {
                $targetName = "老青岛";
            }

            $secondValue= I("secondValue");

            $methodArgs = array($targetName,$secondValue);
            $relativeFile = ReflectionHelper::executeMethod("Home\Model\ShenqiBiz", $methodName, null, $methodArgs);

            $webFile = __ROOT__ . $relativeFile;
            $this->assign("imgsrc", $webFile);
        }

        $this->display("index");
    }

    public function neiku()
    {
        $this->assign("title", "美女内裤");
        $this->detail("neiku");
    }

    public function chuanpiao()
    {
        $this->assign("title", "法院传票");
        $this->detail("chuanpiao");
    }

    public function jiejiu()
    {
        $this->assign("title", "戒酒宣言");
        $this->detail("jiejiu");
    }

    public function wurenji()
    {
        $this->assign("title", "无人机驾驶证");
        $this->detail("wurenji");
    }

    public function maerdaifu()
    {
        $this->assign("title", "马尔代夫旅游");
        $this->detail("maerdaifu");
    }

    public function nianzhongzongjie()
    {
        $this->assign("title", "年终总结");
        $this->detail("nianzhongzongjie");
    }

    public function xinlingjitang()
    {
        $this->assign("title", "心灵鸡汤");
        $this->detail("xinlingjitang");
    }

    public function hupandaxue()
    {
        $this->assign("title", "湖畔大学");
        $this->detail("hupandaxue");
    }


}