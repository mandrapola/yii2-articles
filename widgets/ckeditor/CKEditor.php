<?php
namespace mandrapola\article\widgets\ckeditor;

use yii\base\Model;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 15.01.17
 * Time: 14:34
 */
class CKEditor extends \yii\bootstrap\Widget
{

    public $model;
    public $attribute;
    public $value;
    public $view;
    public $field;
    public $name;
    public $options = ['class' => 'form-control'];
    public function init()
    {
//        $this->options['id'] = Html::getInputId($this->model, $this->attribute);
        parent::init();

        if ($this->hasModel()) {
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
            $this->name = Html::getInputName($this->model,$this->attribute);
        }

    }

    protected function hasModel()
    {
        return $this->model instanceof Model && $this->attribute !== null;
    }

    public function run()
    {
        return $this->render('index', ['data' => $this]);
    }
}