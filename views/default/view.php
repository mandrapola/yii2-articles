<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 06.02.17
 * Time: 15:49
 */
$this->title = $model->title;
?>
<?= \yii\helpers\Html::tag('h1',$model->title);?>
<?= Yii::$app->formatter->asRaw($model->body);?>