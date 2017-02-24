<?php
namespace mandrapola\article\models;

use app\helpers\Inflector;
use Yii;
use yii\db\Expression;

class Tree extends \kartik\tree\models\Tree
{
/**
* @inheritdoc
*/
public static function tableName()
{
    return 'tree';
}

    /**
     * @return
     */
    public function getParent(){
        return Tree::find()
            ->andWhere(['lvl'=>$this->lvl-1])
            ->andWhere(['<','lft',$this->lft])
            ->andWhere(['>','rgt',$this->rgt])
            ->andWhere(['root'=>$this->root])
            ->one();
    }

    public function getRoot(){
        return $this->hasOne(Tree::className(),['id'=>'root']);
    }

    public static function findSlug($slug)
    {
        $models = self::find()->all();
        foreach ($models as $model)
        {
            if (Inflector::slug($model->name)==$slug)
                return $model;
        }
        return false;
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(),['tree_id'=>'id'])->orderBy(['created_at'=>SORT_ASC]);
    }
}