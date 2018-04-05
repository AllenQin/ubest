<?php

use yii\db\Migration;

/**
 * Class m180405_124302_user_best_tag
 */
class m180405_124302_user_best_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="用户best标签"';
        }

        $this->createTable('{{%user_best_tag}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unsigned()->notNull()->comment('用户uid'),
            'tag_id' => $this->integer(1)->unsigned()->notNull()->comment('标签'),
            'tag_name' => $this->char(20)->notNull()->comment('标签名称'),
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
        echo "m180405_124302_user_best_tag cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_124302_user_best_tag cannot be reverted.\n";

        return false;
    }
    */
}
