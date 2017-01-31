<?php
namespace mandrapola\article\widgets\ckeditor;
use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 15.01.17
 * Time: 14:36
 */
class CKEditorAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets/standart';
    public $css = [

    ];
    public $js =[

    ];
    public $head_js = [
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
        foreach ($this->head_js as $js) {
            $options = [];
            $options["position"] = \yii\web\View::POS_HEAD;
            $url = \yii\helpers\Url::to($this->baseUrl . '/' . $js);
            $view->registerJsFile($url, $options);
        }

        parent::registerAssetFiles($view);
    }
}