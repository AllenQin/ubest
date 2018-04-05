<?php

use yii\db\Migration;

/**
 * Class m180405_124753_user_image
 */
class m180405_124753_user_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="用户头像图片"';
        }

        $this->createTable('{{%user_image}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unsigned()->notNull()->comment('用户uid'),
            'image' => $this->char(150)->notNull()->comment('图片地址'),
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
        echo "m180405_124753_user_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_124753_user_image cannot be reverted.\n";

        return false;
    }
    */
}
