<?php
namespace mandrapola\article\controllers;
use mandrapola\article\models\ArticleSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 18.01.17
 * Time: 9:27
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
    /**
     * @return
     */
    public function actionIndex(){
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTree(){
        return $this->render('tree');
    }
}