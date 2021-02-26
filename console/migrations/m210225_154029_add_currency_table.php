<?php

use yii\db\Migration;

/**
 * Class m210225_154029_add_currency_table
 */
class m210225_154029_add_currency_table extends Migration
{


    const TABLE_NAME = 'currency';
    

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'rate' => $this->float()->notNull(),
            'code' => $this->string()->notNull()->unique(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210225_154029_add_currency_table cannot be reverted.\n";

        return false;
    }
    */
}
