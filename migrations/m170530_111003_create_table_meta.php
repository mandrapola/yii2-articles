<?php

use mandrapola\article\migrations\ExtendMigration;
use yii\db\mysql\Schema;

class m170530_111003_create_table_meta extends ExtendMigration
{
    public $table = 'article_meta';

    public function up()
    {
        $this->createTableExt([
            'id'         => Schema::TYPE_PK,
            'article_id' => Schema::TYPE_INTEGER,
            'name'       => Schema::TYPE_STRING . '(25) NOT NULL',
            'content'    => Schema::TYPE_STRING,
        ]);

        $this->addForeignKeyExt('article_id','article','id');

    }

    public function down()
    {
        $this->dropTableExt();
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
