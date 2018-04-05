<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_msg_line".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property int $target_uid 对方uid
 * @property int $status 状态 0 开启聊天 1 删除聊天 2 被删除聊天
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class UserLiveLine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_msg_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'target_uid'], 'required'],
            [['uid', 'target_uid', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'string', 'max' => 1],
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
            'target_uid' => 'Target Uid',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
