<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_best_tag".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property int $tag_id 标签
 * @property string $tag_name 标签名称
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class UserBestTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_best_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'tag_id', 'tag_name'], 'required'],
            [['uid', 'tag_id', 'created_at', 'updated_at'], 'integer'],
            [['tag_name'], 'string', 'max' => 20],
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
            'tag_id' => 'Tag ID',
            'tag_name' => 'Tag Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
