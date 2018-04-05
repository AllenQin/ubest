<?php

use yii\db\Migration;

/**
 * Class m180405_155058_update_user_setting
 */
class m180405_155058_update_user_setting extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE u_user_setting ADD COLUMN sexual TINYINT(1) UNSIGNED DEFAULT 0 COMMENT '性取向 0:女生 1:男生'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_155058_update_user_setting cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_155058_update_user_setting cannot be reverted.\n";

        return false;
    }
    */
}
