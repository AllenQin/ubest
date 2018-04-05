<?php

use yii\db\Migration;

/**
 * Class m180405_133651_user_msg_line
 */
class m180405_133651_user_msg_line extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="用户聊天关系"';
        }

        $this->createTable('{{%user_msg_line}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unsigned()->notNull()->comment('用户uid'),
            'target_uid' => $this->integer(1)->unsigned()->notNull()->comment('对方uid'),
            'status' => $this->tinyInteger(1)->unsigned()->defaultValue(0)->comment('状态 0 开启聊天 1 删除聊天 2 被删除聊天'),
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
        echo "m180405_133651_user_msg_line cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_133651_user_msg_line cannot be reverted.\n";

        return false;
    }
    */
}
