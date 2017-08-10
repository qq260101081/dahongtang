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

    public function actionSendEmail()
    {
        
        $info = Yii::$app->mailer->compose()
            ->setTo('260101081@qq.com')  //对方的邮箱
            ->setSubject('yii2邮件发送')  
            ->setTextBody('发送成功')  
            ->send(); 
        var_dump($info);
    }

}
