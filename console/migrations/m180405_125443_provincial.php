<?php

use yii\db\Migration;

/**
 * Class m180405_125443_provincial
 */
class m180405_125443_provincial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="省份"';
        }

        $this->createTable('{{%provincial}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(40)->notNull()->defaultValue('')->comment('名称')
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_125443_provincial cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_125443_provincial cannot be reverted.\n";

        return false;
    }
    */
}
