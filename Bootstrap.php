<?php
namespace article;

use Yii;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

/**
* Bootstrap class registers module and user application component. It also creates some url rules which will be applied
* when UrlManager.enablePrettyUrl is enabled.
*
* @author Dmitry Erofeev <dmeroff@gmail.com>
*/
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {

        if (!isset($app->get('i18n')->translations['article*'])) {
            $app->get('i18n')->translations['article*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => 'mandrapola\article\messages',
                'languages' => ['ru'],
            ];
        }
    }
}