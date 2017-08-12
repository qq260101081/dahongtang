<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        echo 1;die;
    }

    public function actionTe()
    {
        header("Access-Control-Allow-Origin: *");

        $post = Yii::$app->request->post();
        $name = isset($post['name']) ? $post['name'] : '';
        $tel = isset($post['tel']) ? $post['tel'] : '';
        $wx = isset($post['wx']) ? $post['wx'] : '';
        $address = isset($post['address']) ? $post['address'] : '';

        $content = $name . "\n" . $tel . "\n" . $wx . "\n" . $address;
        $info = Yii::$app->mailer->compose()
            ->setTo('408072217@qq.com')  //对方的邮箱
            ->setSubject('在线申请加盟')
            ->setTextBody($content)
            ->send(); 
        die(json_encode(['msg' => $info]));
    }

}
