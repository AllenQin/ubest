<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "u_user_setting".
 *
 * @property int $id
 * @property int $uid 用户id
 * @property int $msg_tip 接收消息
 * @property int $display 显示资料
 */
class UserSetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'integer'],
            [['msg_tip', 'display'], 'string', 'max' => 1],
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
            'msg_tip' => 'Msg Tip',
            'display' => 'Display',
        ];
    }
}
