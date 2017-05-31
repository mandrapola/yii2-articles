<?php
namespace mandrapola\article\models;
use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: marat
 * Date: 30.05.17
 * Time: 15:00
 */
class ArticleMeta extends ActiveRecord
{
    public static function tableName()
    {
        return 'article_meta';
    }


    public function rules()
    {
        return [
            [['content','name'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'content' => 'Значение',
            'name' => 'Название',
        ];
    }

}