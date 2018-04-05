<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "u_tags".
 *
 * @property int $id
 * @property string $name 标签名称
 * @property int $nums 引用数量
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'u_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['nums', 'created_at', 'updated_at'], 'integer'],
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
            'name' => 'Name',
            'nums' => 'Nums',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
