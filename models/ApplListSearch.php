<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ApplList;

/**
 * ApplListSearch represents the model behind the search form of `app\models\ApplList`.
 */
class ApplListSearch extends ApplList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_study', 'status'], 'integer'],
            [['app_name', 'description', 'dev_framework', 'owner', 'url', 'date_created', 'date_modified', 'feature_image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ApplList::find();

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
            'fk_study' => $this->fk_study,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'app_name', $this->app_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'dev_framework', $this->dev_framework])
            ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'feature_image', $this->feature_image]);

        return $dataProvider;
    }
}
