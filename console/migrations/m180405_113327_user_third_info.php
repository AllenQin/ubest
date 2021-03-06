<?php

use yii\db\Migration;

/**
 * Class m180405_113327_user_third_info
 */
class m180405_113327_user_third_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB comment="第三方授权信息表"';
        }

        $this->createTable('{{%user_third_info}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(1)->unique()->notNull()->comment('用户uid'),
            'openid' => $this->char(200)->null()->comment('微信id'),
            'weibo' => $this->char(200)->null()->comment('微博id'),
            'created_at' => $this->integer(1)->unsigned()->notNull()->comment('创建时间'),
            'updated_at' => $this->integer(1)->unsigned()->notNull()->comment('更新时间'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180405_113327_user_third_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180405_113327_user_third_info cannot be reverted.\n";

        return false;
    }
    */
}
