<?php

namespace mandrapola\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ArticleSearch represents the model behind the search form of `article\models\Article`.
 */
class ArticleSearch extends Article
{
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
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'         => $this->id,
            'used'       => $this->used,
            'tree_id'    => $this->tree_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'anons', $this->anons])
            ->andFilterWhere(['=', 'used', $this->used])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }

    public function itemsNavBar($params){
        $tree = Tree::findOne(['name'=>$params['tree']]);
        if (!$tree) return [];
        $query = Article::find();
        $this->load($params,'');
        $query->andFilterWhere([
            'id'         => $this->id,
            'used'       => $this->used,
            'tree_id'    => $tree->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $models =$query->all();
        foreach($models as $item)
        {
            $items[]=$item->itemNavbar;
        }
        return $items;
}
}
