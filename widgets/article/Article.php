<?php
namespace mandrapola\article\widgets\article;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 15.01.17
 * Time: 14:34
 */
class Article extends \yii\bootstrap\Widget
{

    public $model;
    public $classContainer;
    public $view = 'view';
    private $tags;

    public function init()
    {
        parent::init();
        $this->classContainer = array_reverse($this->classContainer);
        $this->view = $this->model->template ?: 'view';
        $this->tags = $this->model->tags;
    }

    public function run()
    {
       $this->registerMetaTags();
        return $this->render($this->view, ['model' => $this->model, 'classContainer' => $this->classContainer]);
    }

    private function registerMetaTags()
    {
        foreach ($this->tags as $tag)
        {
            if ($tag->name && $tag->content) {
                switch (strtolower($tag->name)) {
                    case 'title' :
                        \Yii::$app->view->title = $tag->content;
                        break;
                    default :
                        \Yii::$app->view->registerMetaTag(['name' => $tag->name, 'content' => $tag->content]);
                }
            }
        }
    }
}