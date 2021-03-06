<?php

namespace mandrapola\article\widgets\ckeditor;

use yii\web\AssetBundle;
/**
 * Class CKEditorAsset
 *
 * @package mandrapola\article\widgets\ckeditor
 */
class CKEditorAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets/all';
    public $css = [

    ];
    public $js = [

    ];
    public $headJs = [
        'ckeditor.js',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        foreach ($this->headJs as $js) {
            $options = [];
            $options["position"] = \yii\web\View::POS_HEAD;
            $url = \yii\helpers\Url::to($this->baseUrl.'/'.$js);
            $view->registerJsFile($url, $options);
        }

        parent::registerAssetFiles($view);
    }
}