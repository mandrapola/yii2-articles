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


    <?php
    foreach ($tags as $tag) {
        $form = ActiveForm::begin();
        ?>
        <div class="article-form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="h3">&lt;meta name="<?=$tag->name?>" content="<?=$tag->content?>" &gt;</p>


                    </div>
                <div class="panel-body">
            <?= $form->field($tag, 'id')->hiddenInput()->label(false); ?>

            <?= $form->field($tag, 'article_id')->hiddenInput()->label(false); ?>

            <?= $form->field($tag, 'name')->textInput(['maxlength' => true]); ?>

            <?= $form->field($tag, 'content')->textarea(); ?>

            <?= Html::submitButton('Save',['class'=>'btn btn-success pull-right']) ?>
            <?=Html::a('<span class="glyphicon glyphicon-trash"></span>',['/article/admin/delete-tag','id'=>$tag->id],['class'=>'btn btn-danger','data'=>['confirm'=>'Вы уверены, что хотите удалить это метатэг?']])?>
                    </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    <?php
    }
    ?>



