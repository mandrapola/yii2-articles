<?php

namespace mandrapola\article;
use yii\i18n\PhpMessageSource;

/**
 * article module definition class
 */
class Module extends \yii\base\Module
{
    public $classContainer = ['container','content'];
    public $template = [
        'view' => 'Статья',
        'news' => 'Новости',
    ];
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mandrapola\article\controllers';
}
