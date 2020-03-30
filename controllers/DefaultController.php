<?php

namespace mandrapola\article\controllers;

use mandrapola\article\models\Article;
use mandrapola\article\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class DefaultController
 *
 * @package mandrapola\article\controllers
 */
class DefaultController extends Controller
{
    /**
     * Lists all Article models
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * View tree articles
     *
     * @return mixed
     */
    public function actionTree()
    {
        return $this->render('tree');
    }

    /**
     * View article by slug
     *
     * @param string $slug
     *
     * @return mixed
     */
    public function actionView($slug)
    {
        $model = $this->findModelBySlug($slug);

        return $this->render('view', ['model' => $model, 'classContainer' => $this->module->classContainer]);
    }

    /**
     * Find article by slug
     *
     * @param string $slug
     *
     * @return mixed
     */
    protected function findModelBySlug($slug)
    {
        if (($model = Article::findOne(['alias' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}