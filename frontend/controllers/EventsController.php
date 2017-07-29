<?php
/**
 * Created by 260101081@qq.com
 * User: carl
 * Date: 16/11/21 上午11:22
 */

namespace frontend\controllers;


use frontend\models\Events;
use yii\web\Controller;
use yii\data\Pagination;

class EventsController extends Controller
{
    public function actionList()
    {
        Yii::$app->response->format=Response::FORMAT_JSON;

        $query = Events::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>20]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $models;
    }
}