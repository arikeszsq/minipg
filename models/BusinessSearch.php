<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Business;

/**
 * BusinessSearch represents the model behind the search form of `app\models\Business`.
 */
class BusinessSearch extends Business
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'code', 'tag', 'logo', 'banner', 'phone', 'wx_num', 'address', 'valid_age_end', 'valid_age_start', 'valid_age', 'detail', 'coupon_detail', 'status', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Business::find();

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
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'banner', $this->banner])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'wx_num', $this->wx_num])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'valid_age_end', $this->valid_age_end])
            ->andFilterWhere(['like', 'valid_age_start', $this->valid_age_start])
            ->andFilterWhere(['like', 'valid_age', $this->valid_age])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'coupon_detail', $this->coupon_detail])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted_at', $this->deleted_at]);

        return $dataProvider;
    }
}
