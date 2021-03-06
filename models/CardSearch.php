<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Card;

/**
 * CardSearch represents the model behind the search form of `app\models\Card`.
 */
class CardSearch extends Card
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count', 'sale_max_num', 'already_sale_num', 'stay_num', 'version', 'allow_coupon_num', 'everyone_max_num'], 'integer'],
            [['name', 'description', 'status', 'valid_time_start', 'valid_time_end', 'valid_time', 'pic_url', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Card::find();

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
            'valid_time_start' => $this->valid_time_start,
            'valid_time_end' => $this->valid_time_end,
            'price' => $this->price,
            'origin_price' => $this->origin_price,
            'count' => $this->count,
            'sale_max_num' => $this->sale_max_num,
            'already_sale_num' => $this->already_sale_num,
            'stay_num' => $this->stay_num,
            'version' => $this->version,
            'allow_coupon_num' => $this->allow_coupon_num,
            'everyone_max_num' => $this->everyone_max_num,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'valid_time', $this->valid_time])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url]);

        return $dataProvider;
    }
}
