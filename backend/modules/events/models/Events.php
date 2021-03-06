<?php

namespace app\modules\events\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property integer $created_at
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content','list_img'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['info'], 'string', 'max' => 300],
            //['created_at','default','value'=>time()]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '标题'),
            'info' => Yii::t('app', '摘要'),
            'list_img' => Yii::t('app', '图片'),
            'content' => Yii::t('app', '内容'),
            'created_at' => Yii::t('app', '创建时间'),
        ];
    }
}
