<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_image".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property string $image 图片地址
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class UserImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'image'], 'required'],
            [['uid', 'created_at', 'updated_at'], 'integer'],
            [['image'], 'string', 'max' => 150],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
