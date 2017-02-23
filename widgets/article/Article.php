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
    public $view = 'view';
    public function init()
    {
        parent::init();
        $this->classContainer = array_reverse($this->classContainer);
        $this->view = $this->model->template?:'view';
    }
    public function run()
    {
        return $this->render($this->view, ['model' => $this->model,'classContainer' => $this->classContainer]);
    }
}