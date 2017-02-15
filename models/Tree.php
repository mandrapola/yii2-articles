<?php
namespace mandrapola\article\models;

use Yii;

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
            ->one();
    }
}