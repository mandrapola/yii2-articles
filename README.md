Articles
========
Articles module for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mandrapola/yii2-articles "*"
```

or add

```
"mandrapola/yii2-articles": "*"
```

to the require section of your `composer.json` file.


Usage
-----

```php
<?= \mandrapola\article\widgets\article\Article::widget(['model' => $model, 'classContainer' => $classContainer]) ?>
```  

$model - Article entity.  
$classContainer - Names containers for render content. Default ['container', 'content'].  