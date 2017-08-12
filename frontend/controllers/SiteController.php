<?php
namespace frontend\controllers;


use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class SiteController extends Controller
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => '*',
                    'Access-Control-Request-Method' => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,

                ],
            ],
        ]);
    }


    public function actionIndex()
    {
        echo 1;die;
    }

    public function actionTe()
    {
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
