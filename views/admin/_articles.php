<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 27.01.17
 * Time: 17:53
 */
$searchModel = new \mandrapola\article\models\ArticleSearch();
$dataProvider = $searchModel->search(['ArticleSearch' => ['tree_id' => $node->id]]);

?>
    <div class="article-index">

        <p>
            <?= \yii\bootstrap\Html::a(Yii::t('article', 'Create Article'),
                ['/article/admin/create',
                    'Article' => ['tree_id' => $node->id]],
                ['class' => 'btn btn-success']) ?>
        </p>


    </div>
<?php \yii\widgets\Pjax::begin(['id' => 'notes']) ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        'alias',
        [
            'attribute' => 'used',
            'format'    => 'boolean',
            'filter'    => [0 => 'Нет', 1 => 'Да',],
        ],
        'created_at',
        'updated_at',

        ['class'    => 'yii\grid\ActionColumn',
         'buttons'  => [
             'tags'   => function ($url, $model) {
                 $urlTags = \yii\helpers\Url::to(['/article/admin/meta', 'id' => $model->id]);

                 return \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('tags'), $urlTags, ['title' => 'Tags', 'aria-label' => 'Tags', 'data-pjax' => 0]);
             },
             'view'   => function ($url, $model) {
                 $urlTags = \yii\helpers\Url::to(['/article/admin/view', 'id' => $model->id]);

                 return \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('eye-open'), $urlTags, ['title' => 'Tags', 'aria-label' => 'Tags', 'data-pjax' => 0]);
             },
             'update' => function ($url, $model) {
                 $urlTags = \yii\helpers\Url::to(['/article/admin/update', 'id' => $model->id]);

                 return \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('pencil'), $urlTags, ['title' => 'Tags', 'aria-label' => 'Tags', 'data-pjax' => 0]);
             },
             'delete' => function ($url, $model) {
                 $urlTags = \yii\helpers\Url::to(['/article/admin/delete', 'id' => $model->id]);

                 return \yii\bootstrap\Html::a(\yii\bootstrap\Html::icon('trash'), $urlTags, ['title' => 'Tags', 'aria-label' => 'Tags', 'data-pjax' => 0, 'data-method' => 'post', 'data-confirm' => 'Are you sure you want to delete this item?']);
             },

         ],
         'template' => '{tags} {view} {update} {delete}'],
    ],
]);
; ?>
<?php \yii\widgets\Pjax::end() ?>