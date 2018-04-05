<?php

use yii\db\Migration;

/**
 * Class m180405_122236_user_base_info
 */
class m180405_122236_user_base_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="用户基本信息表"';
        }

        $this->createTable('{{%user_base_info}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unsigned()->notNull()->comment('用户uid'),
            'nickname' => $this->char(60)->null()->comment('用户昵称'),
            'gender' => $this->tinyInteger(1)->unsigned()->notNull()
                ->defaultValue(0)->comment('性别'),
            'birthday' => $this->integer(1)->unsigned()->notNull()
                ->defaultValue(0)->comment('出生年月日'),
            'constellation' => $this->char(60)->notNull()->comment('星座'),
            'last_active_time' => $this->integer(1)->unsigned()->notNull()
                ->defaultValue(0)->comment('最后活跃时间'),
            'industry' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('行业'),
            'occupation' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('职业'),
            'province' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('省份'),
            'city' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('城市'),
            'declaration' => $this->text()->comment('宣言'),
            'created_at' => $this->integer(1)->unsigned()
                ->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(1)->unsigned()
                ->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_122236_user_base_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_122236_user_base_info cannot be reverted.\n";

        return false;
    }
    */
}
