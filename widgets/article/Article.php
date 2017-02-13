<?php
namespace mandrapola\article\widgets\article;

use yii\base\Model;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 15.01.17
 * Time: 14:34
 */
class Article extends \yii\bootstrap\Widget
{

    public $model;
    public $classContainer;
    public function init()
    {
        parent::init();
        $this->classContainer = array_reverse($this->classContainer);
    }
    public function run()
    {
        return $this->render('view', ['model' => $this->model,'classContainer' => $this->classContainer]);
    }
}