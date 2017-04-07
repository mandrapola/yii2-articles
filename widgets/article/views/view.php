<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 06.02.17
 * Time: 15:49
 */
$this->title .= ' ' . $model->title;
$this->params['breadcrumbs'] = [['label' => $model->title]];
$this->registerMetaTag(['name' => 'og:description', 'content' => $model->anons]);
$content = \yii\helpers\Html::tag('h1', $model->title) . Yii::$app->formatter->asRaw($model->body);
foreach ($classContainer as $class) {
    $content = \yii\helpers\Html::tag('div', $content, ['class' => $class]);
}
echo $content;



