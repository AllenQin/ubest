<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_base_info".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property string $nickname 用户昵称
 * @property int $gender 性别
 * @property int $birthday 出生年月日
 * @property string $constellation 星座
 * @property int $last_active_time 最后活跃时间
 * @property int $industry 行业
 * @property int $occupation 职业
 * @property int $province 省份
 * @property int $city 城市
 * @property string $declaration 宣言
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property string $avatar 头像
 */
class UserBaseInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_base_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'birthday', 'last_active_time', 'industry', 'occupation', 'province', 'city', 'created_at', 'updated_at', 'gender'], 'integer'],
            [['declaration'], 'string'],
            [['nickname', 'constellation'], 'string', 'max' => 60],
            [['avatar'], 'string', 'max' => 200],
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
            'nickname' => 'Nickname',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'constellation' => 'Constellation',
            'last_active_time' => 'Last Active Time',
            'industry' => 'Industry',
            'occupation' => 'Occupation',
            'province' => 'Province',
            'city' => 'City',
            'avatar' => '头像',
            'declaration' => 'Declaration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
