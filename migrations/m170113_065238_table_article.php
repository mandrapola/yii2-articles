<?php
use mandrapola\article\migrations\Migration;
use yii\db\mysql\Schema;

class m170113_065238_table_article extends Migration
{
    private $table = '{{%article}}';

    public function up()
    {
        $this->createTable($this->table, [
            'id'         => Schema::TYPE_PK,
            'title'      => Schema::TYPE_STRING . '(250)',
            'alias'      => Schema::TYPE_STRING . '(250)',
            'anons'      => Schema::TYPE_STRING . '(250)',
            'body'       => Schema::TYPE_TEXT,
            'used'       => Schema::TYPE_BOOLEAN,
            'tree_id'    => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_TIMESTAMP,
            'updated_at' => Schema::TYPE_TIMESTAMP
        ]);
    }

    public function down()
    {
        $this->dropTable($this->table);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
