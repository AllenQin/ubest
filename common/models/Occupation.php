<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "u_occupation".
 *
 * @property int $id
 * @property int $pid 行业id
 * @property string $name 职业名称
 */
class Occupation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_occupation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'name' => 'Name',
        ];
    }
}
