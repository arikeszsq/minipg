<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count'], 'integer'],
            [['name','card_name', 'status', 'logo_url', 'background_url', 'start_time', 'end_time', 'address', 'detail', 'price_detail', 'everyone_comment', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['price', 'origin_price'], 'number'],
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
        $query = Activity::find();

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
            'price' => $this->price,
            'count' => $this->count,
            'origin_price' => $this->origin_price,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card_name', $this->status])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'logo_url', $this->logo_url])
            ->andFilterWhere(['like', 'background_url', $this->background_url])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'price_detail', $this->price_detail])
            ->andFilterWhere(['like', 'everyone_comment', $this->everyone_comment])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted_at', $this->deleted_at]);

        return $dataProvider;
    }
}
