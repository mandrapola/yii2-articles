<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mandrapola\article\models\Tree;
use mandrapola\article\widgets\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model mandrapola\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anons')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'used')->checkbox() ?>
    <?= $form->field($model, 'tree_id')->widget(\kartik\tree\TreeViewInput::className(),[
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Categories'],
        'asDropdown' => true,            // will render the tree input widget as a dropdown.
        'multiple' => false,            // set to false if you do not need multiple selection
        'fontAwesome' => false,            // render font awesome icons

    ]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('article', 'Create') : Yii::t('article', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
