<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 18.01.17
 * Time: 9:29
 */
use kartik\tree\TreeView;
use use mandrapola\article\models\Tree;
echo TreeView::widget([
    // single query fetch to render the tree
    'query'             => Tree::find()->addOrderBy('root, lft'),
    'headingOptions'    => ['label' => 'Categories'],
    'isAdmin'           => true,                       // optional (toggle to enable admin mode)
    'displayValue'      => 1,                           // initial display value
    'softDelete'      => true,                        // normally not needed to change
    'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);