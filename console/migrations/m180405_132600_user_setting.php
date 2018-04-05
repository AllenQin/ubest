<?php

use yii\db\Migration;

/**
 * Class m180405_132600_user_setting
 */
class m180405_132600_user_setting extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="用户设置"';
        }

        $this->createTable('{{%user_setting}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('用户id'),
            'msg_tip' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('接收消息'),
            'display' => $this->tinyInteger(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('显示资料'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_132600_user_setting cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_132600_user_setting cannot be reverted.\n";

        return false;
    }
    */
}
