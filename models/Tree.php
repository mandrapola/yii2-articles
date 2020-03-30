<?php

namespace mandrapola\article\models;

use Yii;
use yii\helpers\Inflector;

/**
 * Class Tree
 *
 * @package mandrapola\article\models
 */
class Tree extends \kartik\tree\models\Tree
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'tree';
    }

    /**
     * @param string $slug
     *
     * @return bool|Tree
     */
    public static function findSlug($slug)
    {
        $models = self::find()->all();
        foreach ($models as $model) {
            if (Inflector::slug($model->name) == $slug) {
                return $model;
            }
        }

        return false;
    }

    /**
     * Return parent branch
     * @return mixed
     */
    public function getParent()
    {
        return self::find()
            ->andWhere(['lvl' => $this->lvl - 1])
            ->andWhere(['<', 'lft', $this->lft])
            ->andWhere(['>', 'rgt', $this->rgt])
            ->andWhere(['root' => $this->root])
            ->one();
    }

    /**
     * Return root branch
     *
     * @return mixed
     */
    public function getRoot()
    {
        return $this->hasOne(Tree::className(), ['id' => 'root']);
    }

    /**
     * @return Article[]
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['tree_id' => 'id'])->orderBy(['created_at' => SORT_ASC]);
    }
}