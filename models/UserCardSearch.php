<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserCard;

/**
 * UserCardSearch represents the model behind the search form of `app\models\UserCard`.
 */
class UserCardSearch extends UserCard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'card_id', 'status', 'parent_moblie'], 'integer'],
            [['card_name', 'valid_time_start', 'valid_time_end', 'valid_time', 'created_at', 'updated_at', 'deleted_at', 'parent_name', 'card_num', 'child_name', 'child_gender', 'child_birthday', 'child_age', 'cipher'], 'safe'],
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
        $query = UserCard::find();

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
            'user_id' => $this->user_id,
            'card_id' => $this->card_id,
            'status' => $this->status,
            'valid_time_start' => $this->valid_time_start,
            'valid_time_end' => $this->valid_time_end,
            'valid_time' => $this->valid_time,
            'updated_at' => $this->updated_at,
            'parent_moblie' => $this->parent_moblie,
        ]);

        $query->andFilterWhere(['like', 'card_name', $this->card_name])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted_at', $this->deleted_at])
            ->andFilterWhere(['like', 'parent_name', $this->parent_name])
            ->andFilterWhere(['like', 'card_num', $this->card_num])
            ->andFilterWhere(['like', 'child_name', $this->child_name])
            ->andFilterWhere(['like', 'child_gender', $this->child_gender])
            ->andFilterWhere(['like', 'child_birthday', $this->child_birthday])
            ->andFilterWhere(['like', 'child_age', $this->child_age])
            ->andFilterWhere(['like', 'cipher', $this->cipher]);

        return $dataProvider;
    }
}
