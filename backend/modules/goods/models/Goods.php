<?php
/**
 * Created by 260101081@qq.com
 * User: carl
 * Date: 16/12/15 下午12:33
 */

namespace backend\modules\goods\models;

use Yii;

/**
 * Class Orders
 * @package app\modules\orders\models
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $teacher_name;
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','subtitle','list_pic','season','spec','type','craft','price','category','created_at'], 'safe'],
            //['created_at', 'default', 'value' => time()]
            [['category'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '商品名称'),
            'subtitle' => Yii::t('app', '名称副标题'),
            'list_pic' => Yii::t('app', '缩略图'),
            'season' => Yii::t('app', '季节'),
            'spec' => Yii::t('app', '规格'),
            'type' => Yii::t('app', '类型'),
            'craft' => Yii::t('app', '工艺'),
            'price' => Yii::t('app', '价格'),
            'category' => Yii::t('app', '分类'),
            'created_at' => Yii::t('app', '创建时间'),
        ];
    }
}
