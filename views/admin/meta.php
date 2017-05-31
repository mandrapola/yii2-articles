<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 30.05.17
 * Time: 16:42
 */
echo \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('plus').Yii::t('article', 'Create Tag'), ['create-tag', 'id' => $model->id], ['class' => 'btn btn-primary']) ;
echo $this->render('_form_meta',['tags'=>$tags]);