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

    public function run()
    {
        return $this->render('view', ['model' => $this->model]);
    }
}