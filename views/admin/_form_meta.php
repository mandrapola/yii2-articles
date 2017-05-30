<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 30.05.17
 * Time: 15:11
 */
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="article-form">

    <?php $form = ActiveForm::begin();

    foreach ($metas as $meta)
    {
        $form->field($meta, 'name')->textInput(['maxlength' => true]);

        $form->field($meta, 'content')->textInput(['maxlength' => true]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('Meta Tag', 'Create') : Yii::t('Meta Tag', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>