<?php

namespace article\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $anons
 * @property string $body
 * @property integer $used
 * @property integer $article_group_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ArticleGroup $articleGroup
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['used', 'tree_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'alias', 'anons'], 'string', 'max' => 250],
            [['tree_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tree::className(), 'targetAttribute' => ['tree_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('article', 'ID'),
            'title' => Yii::t('article', 'Title'),
            'alias' => Yii::t('article', 'Alias'),
            'anons' => Yii::t('article', 'Anons'),
            'body' => Yii::t('article', 'Body'),
            'used' => Yii::t('article', 'Used'),
            'tree_id' => Yii::t('article', 'Tree ID'),
            'created_at' => Yii::t('article', 'Created At'),
            'updated_at' => Yii::t('article', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTree()
    {
        return $this->hasOne(Tree::className(), ['id' => 'tree_id']);
    }
}
