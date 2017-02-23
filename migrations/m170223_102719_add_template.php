<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m170223_102719_add_template extends Migration
{
    private $table = '{{%article}}';

    public function up()
    {
        $this->addColumn($this->table, 'template', Schema::TYPE_STRING);
        $this->createIndex('template_index',$this->table,'template');
    }

    public function down()
    {
        $this->dropIndex('template_index',$this->table);
        $this->dropColumn($this->table, 'template');
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
