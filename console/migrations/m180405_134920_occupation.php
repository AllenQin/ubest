<?php

use yii\db\Migration;

/**
 * Class m180405_134920_occupation
 */
class m180405_134920_occupation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="职业"';
        }

        $this->createTable('{{%occupation}}', [
            'id' => $this->primaryKey(),
            'pid' => $this->integer(1)->unsigned()->notNull()->defaultValue(0)
                ->comment('行业id'),
            'name' => $this->char(100)->notNull()->comment('职业名称'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_134920_occupation cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_134920_occupation cannot be reverted.\n";

        return false;
    }
    */
}
