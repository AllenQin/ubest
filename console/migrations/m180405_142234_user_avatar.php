<?php

use yii\db\Migration;

/**
 * Class m180405_142234_user_avatar
 */
class m180405_142234_user_avatar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE u_user_base_info ADD COLUMN avatar VARCHAR(200) NULL DEFAULT '' COMMENT '用户头像'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_142234_user_avatar cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_142234_user_avatar cannot be reverted.\n";

        return false;
    }
    */
}
