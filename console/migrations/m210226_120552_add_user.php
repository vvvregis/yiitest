<?php

use yii\db\Migration;

/**
 * Class m210226_120552_add_user
 */
class m210226_120552_add_user extends Migration
{

    /**
     * Table name
     *
     * @var string
     */
    private $_user = "{{%user}}";


    /**
     * Runs for the migate/up command
     *
     * @return null
     */
    public function safeUp()
    {
        $time = time();
        $password_hash = Yii::$app->getSecurity()->generatePasswordHash('pass12345');
        $auth_key = Yii::$app->security->generateRandomString();
        $verToken = Yii::$app->security->generateRandomString();
        $table = $this->_user;

        $sql = <<<SQL
        INSERT INTO {$table}
        (`username`, `email`,`password_hash`, `auth_key`, `created_at`, `updated_at`, `verification_token`)
        VALUES
        ('admin', 'admin@yoursite.com',  '$password_hash', '$auth_key', {$time}, {$time}, '{$verToken}')
SQL;
        Yii::$app->db->createCommand($sql)->execute();


    }

    /**
     * Runs for the migate/down command
     *
     * @return null
     */
    public function safeDown()
    {
        $table = $this->_user;
        $sql = <<<SQL
        SELECT id from {$table}
        where username='admin'
SQL;
        $id = Yii::$app->db->createCommand($sql)->execute();
        $this->delete($this->_user, ['username' => 'admin']);
    }

}
