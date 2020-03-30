<?php

namespace mandrapola\article\models;

use yii\db\ActiveRecord;

/**
 * Class ArticleMeta
 *
 * @package mandrapola\article\models
 */
class ArticleMeta extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'article_meta';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['content', 'name'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'content' => 'Значение',
            'name' => 'Название',
        ];
    }

}