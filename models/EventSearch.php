<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form of `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'is_hot', 'need_vip'], 'integer'],
            [['name', 'card_name', 'logo_url', 'background_url', 'start_time', 'end_time', 'address', 'detail', 'price_detail', 'is_recommand', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['price'], 'number'],
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
        $query = Event::find();

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
            'status' => $this->status,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'price' => $this->price,
            'is_hot' => $this->is_hot,
            'need_vip' => $this->need_vip,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'card_name', $this->card_name])
            ->andFilterWhere(['like', 'logo_url', $this->logo_url])
            ->andFilterWhere(['like', 'background_url', $this->background_url])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'price_detail', $this->price_detail])
            ->andFilterWhere(['like', 'is_recommand', $this->is_recommand]);

        return $dataProvider;
    }
}
