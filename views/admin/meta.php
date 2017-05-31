<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 30.05.17
 * Time: 16:42
 */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Articles'), 'url' => ['/article/admin/index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/article/admin/update','id'=>$model->id]];
$this->params['breadcrumbs'][] = Yii::t('article', 'Meta Tags');
echo \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('plus').Yii::t('article', 'Create Tag'), ['create-tag', 'id' => $model->id], ['class' => 'btn btn-primary']) ;
echo $this->render('_form_meta',['tags'=>$tags]);