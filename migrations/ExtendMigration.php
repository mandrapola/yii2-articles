<?php
namespace mandrapola\article\migrations;

/**
 * Class ExtendMigration
 *
 * @package mandrapola\article\migrations
 */
class ExtendMigration extends Migration
{
    public $table;
    public $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

    public function get_table($table_name = '')
    {
        $name = '{{%' . ($table_name ? preg_replace('/([{}%]+)/i', '', $table_name) : $this->table) . '}}';

        return $name;
    }

    public function createTable($table, $columns, $options = null)
    {
        $this->table = preg_replace('/([{}%]+)/i', '', $table);
        parent::createTable($this->get_table(), $columns, $options);
    }

    public function createTableExt($columns, $options = null)
    {
        if ($this->table)
            parent::createTable($this->get_table(), $columns, $options);
    }

    public function getForeignName($columnName)
    {
        $sql = "SELECT
  `CONSTRAINT_NAME` as `name`
FROM
  INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
  `TABLE_SCHEMA` = (SELECT DATABASE()) 
  and `COLUMN_NAME` = '" . $columnName . "'
  and `TABLE_NAME` = '" . $this->table . "'
  and `REFERENCED_TABLE_NAME` is not null;";

        return $this->db->createCommand()->setSql($sql)->queryScalar();
    }

    public function addForeignKeyExt($columns, $refTable, $refColumns, $delete = 'CASCADE', $update = 'CASCADE')
    {
        $this->addForeignKey(uniqid('fk_'), $this->get_table(), $columns, $this->get_table($refTable), $refColumns, $delete, $update);
    }

    public function dropForeignKeyExt($column)
    {
        $foreignKeyName = $this->getForeignName($column);
        if ($foreignKeyName) {
            $this->dropForeignKey($foreignKeyName, $this->table);
        }
    }

    public function addPrimaryKeyExt($columns)
    {
        $name = 'pk_' . $this->table;
        $this->addPrimaryKey($name, $this->get_table(), $columns);
    }

    public function dropPrimaryKeyExt($aname = '')
    {
        $name = $aname ?: 'pk_' . $this->table;
        $this->dropPrimaryKey($name, $this->get_table());
    }

    public function dropTableExt($table = '')
    {
        $this->dropTable($this->get_table($table));
    }

    /**
     * @return
     */
    private function getIndexName($columns)
    {
        return 'index_' . (is_array($columns) ? implode('_', $columns) : $columns);
    }

    public function createIndexExt($columns, $unique = false)
    {
        $name = $this->getIndexName($columns);
        $this->createIndex($name, $this->get_table(), $columns, $unique);
    }

    public function dropIndexExt($columns)
    {
        $name = $this->getIndexName($columns);
        $this->dropIndex($name, $this->get_table());
    }

    public function addColumnExt($column, $type)
    {
        $this->addColumn($this->get_table(), $column, $type);
    }

    /**
     * @return
     */
    public function dropColumnExt($column)
    {
        $this->dropColumn($this->get_table(), $column);

    }

    public function insertExt($columns)
    {
        $this->insert($this->get_table(), $columns);
    }

    public function batchInsertExt($columns, $rows)
    {
        $this->batchInsert($this->get_table(), $columns, $rows);
    }
}