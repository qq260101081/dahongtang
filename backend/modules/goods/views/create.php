<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\guarantee\models\Guarantee */

$this->title = Yii::t('app', '添加商品');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '商品'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mien-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
