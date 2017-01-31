<?php

namespace mandrapola\article;
use yii\i18n\PhpMessageSource;

/**
 * article module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'article\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(\Yii::$app->get('i18n')->translations['article*'])) {
            \Yii::$app->get('i18n')->translations['article*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => '@article/messages',
            ];
        }
    }
}
