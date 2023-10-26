<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservation;

/**
 * Reservationsearch represents the model behind the search form of `app\models\Reservation`.
 */
class Reservationsearch extends Reservation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'book', 'evidencial_number', 'reservator', 'staff'], 'integer'],
            [['date_expiration'], 'safe'],
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
        $query = Reservation::find();

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
            'date' => $this->date,
            'book' => $this->book,
            'evidencial_number' => $this->evidencial_number,
            'date_expiration' => $this->date_expiration,
            'reservator' => $this->reservator,
            'staff' => $this->staff,
        ]);

        return $dataProvider;
    }
}
