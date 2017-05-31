<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 30.05.17
 * Time: 15:11
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<div class="article-form">
    <?php
    foreach ($tags as $tag) {
        $form = ActiveForm::begin();
        ?>
            <?= $form->field($tag, 'article_id')->hiddenInput()->label(false); ?>

            <?= $form->field($tag, 'name')->textInput(['maxlength' => true]); ?>
            <?= $form->field($tag, 'content')->textarea(); ?>

            <?= Html::submitButton('Save',['class'=>'btn btn-success pull-right']) ?>
        <?php ActiveForm::end(); ?>
<hr>
    <?php
    }
    ?>

</div>

