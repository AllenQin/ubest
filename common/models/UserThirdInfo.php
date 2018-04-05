<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_third_info".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property string $openid 微信id
 * @property string $weibo 微博id
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class UserThirdInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_third_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'created_at', 'updated_at'], 'integer'],
            [['openid', 'weibo'], 'string', 'max' => 200],
            [['uid'], 'unique'],
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
            'openid' => '微信id',
            'weibo' => '微博id',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
