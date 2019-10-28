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
            [['id', 'user_id', 'open_id', 'card_id', 'status'], 'integer'],
            [['user_name', 'card_name', 'card_num', 'valid_time_start', 'valid_time_end', 'valid_time', 'cipher', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
            'open_id' => $this->open_id,
            'card_id' => $this->card_id,
            'status' => $this->status,
            'valid_time_start' => $this->valid_time_start,
            'valid_time_end' => $this->valid_time_end,
            'valid_time' => $this->valid_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'card_name', $this->card_name])
            ->andFilterWhere(['like', 'card_num', $this->card_num])
            ->andFilterWhere(['like', 'cipher', $this->cipher]);

        return $dataProvider;
    }
}
