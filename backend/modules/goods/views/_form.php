<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use \kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\guarantee\models\Guarantee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presscentre-form box box-info">
    <div class="box-header with-border">
        <h5 class="box-title"><?= $this->title; ?></h5>
    </div>
    <p></p>

    <div class="box-body">

        <?php $form = ActiveForm::begin([
            'options' => ['class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'order-create'],
            'validateOnBlur' => false,
            'fieldConfig' => [
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                'template' => "{label}\n<div class=\"col-sm-8\">{input}</div>\n<div class=\"col-sm-8\">{error}</div>",
            ]
        ]); ?>

        <?= $form->field($model, 'category', [
            //'options'=> ['class'=>'col-sm-2'],
            //'template' => '{label} <div class="col-sm-2">{input}{error}{hint}</div>'
        ])->dropDownList([
            '' => '请选择分类',
            '茶叶'=>'茶叶',
            '茶具'=>'茶具',
            '单品'=>'单品',
        ]) ?>
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'subtitle')->textInput() ?>
        <?= $form->field($model, 'season')->textInput() ?>
        <?= $form->field($model, 'spec')->textInput() ?>
        <?= $form->field($model, 'type')->textInput() ?>
        <?= $form->field($model, 'craft')->textInput() ?>
        <?= $form->field($model, 'price')->textInput() ?>

        <?=
        $form->field($model, 'list_pic')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' =>[
                'showUpload' => false,
                'showRemove' => false,
                'showPreview' => false,
                'showCaption' => true,
                'allowedFileExtensions'=>['jpg','jpeg','png'],
            ],

        ]);
        ?>
        <?php //$form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]) ?>
        <div class="box-footer">
            <a href="<?= Url::to(['index']);?>" class="col-md-offset-5 btn btn-info fa fa-reply"></a>
            <?= Html::submitButton('', ['class' => 'col-md-offset-1 btn btn-info fa fa-save']) ?>
        </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>

