<?php

use yii\db\Migration;

/**
 * Class m180405_134752_industry
 */
class m180405_134752_industry extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="行业"';
        }

        $this->createTable('{{%industry}}', [
            'id' => $this->primaryKey(),
            'name' => $this->char(100)->notNull()->comment('行业名称'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_134752_industry cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_134752_industry cannot be reverted.\n";

        return false;
    }
    */
}
