<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 27.01.17
 * Time: 17:53
 */?>
<div class="article-index">

<p>
    <?= \yii\bootstrap\Html::a(Yii::t('article', 'Create Article'), ['/article/default/create'], ['class' => 'btn btn-success']) ?>
</p>


</div>
<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'tree.name',
            'label' => Yii::t('article', 'Category')
        ],
        'title',
        'alias',
        'anons',
        'used',
        // 'article_group_id',
        'created_at',
        'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);;?>