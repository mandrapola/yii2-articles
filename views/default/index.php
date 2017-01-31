<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel article\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('article', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$tree = \kartik\tree\TreeView::widget([
// single query fetch to render the tree
    'query' => mandrapola\article\models\Tree::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Categories'],
    'isAdmin' => true,                       // optional (toggle to enable admin mode)
    'displayValue' => 1,                           // initial display value
    'softDelete' => true,                        // normally not needed to change
    'cacheSettings' => ['enableCache' => true]      // normally not needed to change
]);

$articles = $this->render('articles', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);

?>
<?= \yii\bootstrap\Tabs::widget([
    'items' => [[
        'label' => Yii::t('article', 'Structure'),
        'content' => $tree,
        'active' => true,
    ],
    [
        'label' => Yii::t('article', 'Articles'),
        'content' => $articles,
    ]
]]); ?>

