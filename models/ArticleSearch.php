<?php

namespace mandrapola\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use mandrapola\article\models\Article;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * ArticleSearch represents the model behind the search form of `article\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'used', 'tree_id'], 'integer'],
            [['title', 'alias', 'anons', 'body', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'used' => $this->used,
            'tree_id' => $this->tree_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'anons', $this->anons])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
    public static function getRules()
    {
        $query = Article::find();
        $query->andWhere(['not','alias',null]);
        $articles = $query->all();
        return ArrayHelper::map($articles,'alias',function($model){return Url::to(['/article/default/view','id'=>$model->id]);});
    }
}
