<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\modules\guarantee\models\Guarantee */

$this->title = '商品详细';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '查看'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarantee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'subtitle',
            'season',
            'spec',
            'type',
            'craft',
            'price',
            'created_at:date',
            [
                'attribute' => 'list_pic',
                'format' => ['image'],//这个不确定能不能用
                'value'  => Html::img(Yii::$app->request->hostInfo.'/upload/'.$model->list_pic),
            ]
        ],
        'template' => '<tr><th class="col-md-2">{label}</th><td>{value}</td></tr>',
    ]) ?>

</div>