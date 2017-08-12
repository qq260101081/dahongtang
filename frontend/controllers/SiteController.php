<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{

    public function beforeAction($action){
        header("Access-Control-Allow-Origin: *");
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        echo 1;die;
    }

    public function actionTe()
    {
        $get = Yii::$app->request->get();
        $name = isset($get['name']) ? $get['name'] : '';
        $tel = isset($get['tel']) ? $get['tel'] : '';
        $wx = isset($get['wx']) ? $get['wx'] : '';
        $address = isset($get['address']) ? $get['address'] : '';

        $content = '姓名：'.$name . "\n电话：" . $tel . "\n微信" . $wx . "\n地区：" . $address;
        $info = Yii::$app->mailer->compose()
            ->setTo('260101081@qq.com')  //对方的邮箱
            ->setSubject('在线申请加盟')
            ->setTextBody($content)
            ->send(); 
        die(json_encode(['flag' => $info]));
    }

}
