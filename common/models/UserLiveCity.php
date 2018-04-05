<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "u_user_live_city".
 *
 * @property int $id
 * @property int $uid 用户uid
 * @property int $city 城市id
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class UserLiveCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_user_live_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'city'], 'required'],
            [['uid', 'city', 'created_at', 'updated_at'], 'integer'],
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
            'city' => '城市id',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
