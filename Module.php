<?php

namespace mandrapola\article;

/**
 * article module definition class
 */
class Module extends \yii\base\Module
{
    public $classContainer = ['container', 'content'];
    public $template = [
        'view' => 'Статья',
        'news' => 'Новости',
    ];
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mandrapola\article\controllers';
}
