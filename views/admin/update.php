<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mandrapola\article\models\Article */

$this->title = Yii::t('article', 'Update {modelClass}: ', [
        'modelClass' => 'Article',
    ]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('article', 'Update');
?>
<div class="container">
    <div class="article-update">
        <?=\yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('tags'),\yii\helpers\Url::to(['/article/admin/meta','id'=>$model->id]),['title'=>'Tags', 'aria-label'=>'Tags', 'data-pjax'=>0]);?>
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>

