<?php
namespace mandrapola\article\widgets\ckeditor;

use yii\base\Model;
use yii\helpers\Html;

/**
 * Class CKEditor
 *
 * @package mandrapola\article\widgets\ckeditor
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
        parent::init();

        if ($this->hasModel()) {
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
            $this->name = Html::getInputName($this->model, $this->attribute);
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