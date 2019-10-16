<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coupon;

/**
 * CouponSearch represents the model behind the search form of `app\models\Coupon`.
 */
class CouponSearch extends Coupon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'business_id', 'total_num'], 'integer'],
            [['business_name', 'pic_url', 'name', 'description', 'tag', 'suitable_age_end', 'suitable_age_start', 'suitable_age', 'status', 'valid_time', 'valid_time_start', 'valid_time_end', 'using_flow', 'using_detail', 'check_code', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Coupon::find();

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
            'business_id' => $this->business_id,
            'price' => $this->price,
            'total_num' => $this->total_num,
            'valid_time' => $this->valid_time,
            'valid_time_start' => $this->valid_time_start,
            'valid_time_end' => $this->valid_time_end,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'business_name', $this->business_name])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'suitable_age_end', $this->suitable_age_end])
            ->andFilterWhere(['like', 'suitable_age_start', $this->suitable_age_start])
            ->andFilterWhere(['like', 'suitable_age', $this->suitable_age])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'using_flow', $this->using_flow])
            ->andFilterWhere(['like', 'using_detail', $this->using_detail])
            ->andFilterWhere(['like', 'check_code', $this->check_code])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted_at', $this->deleted_at]);

        return $dataProvider;
    }
}
