<?php
/**
 * Created by PhpStorm.
 * User: marat
 * Date: 15.01.17
 * Time: 14:48
 */
\mandrapola\article\widgets\ckeditor\CKEditorAsset::register($this);
?>
<?= \yii\helpers\Html::activeTextarea($data->model, $data->attribute, $data->options); ?>
<script>
    CKEDITOR.replace('<?=$data->name?>');
</script>