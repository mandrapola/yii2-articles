<?php
namespace mandrapola\article\controllers;

use mandrapola\article\models\Article;
use mandrapola\article\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 18.01.17
 * Time: 9:27
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTree()
    {
        return $this->render('tree');
    }

    public function actionView($slug)
    {
        $model = $this->findModelBySlug($slug);

        return $this->render('view', ['model' => $model, 'classContainer' => $this->module->classContainer]);
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Article::findOne(['alias' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}