<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 27.01.17
 * Time: 17:53
 */ ?>
    <div class="article-index">

        <p>
            <?= \yii\bootstrap\Html::a(Yii::t('article', 'Create Article'), ['/article/admin/create'], ['class' => 'btn btn-success']) ?>
        </p>


    </div>
<?php \yii\widgets\Pjax::begin(['id' => 'notes']) ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'tree_id',
            'label'     => Yii::t('article', 'Category'),
            'value'     => function ($model) {
                return $model->tree->name;
            },
            'filter'    => \yii\helpers\ArrayHelper::map(\mandrapola\article\models\Tree::find()->andWhere(['>', 'lvl', 0])->all(), 'id', 'name', function ($model) {
                return $model->parent ? $model->parent->name : '';
            }),

        ],
        'title',
        'alias',
        [
            'attribute' => 'used',
            'format'    => 'boolean',
            'filter'    => [0 => 'Нет', 1 => 'Да',],
        ],
        'created_at',
        'updated_at',

        ['class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'tags' => function ($url,$model){
                    $urlTags = \yii\helpers\Url::to(['/article/admin/meta','id'=>$model->id]);
                    return \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('tags'),$urlTags,['title'=>'Tags', 'aria-label'=>'Tags', 'data-pjax'=>0]);
                }
            ],
         'template' => '{tags} {view} {update} {delete}'],
    ],
]);
; ?>
<?php \yii\widgets\Pjax::end() ?>