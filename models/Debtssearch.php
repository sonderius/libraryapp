<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\debt;

/**
 * Debtssearch represents the model behind the search form of `app\models\debt`.
 */
class Debtssearch extends debt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evidencial_number', 'bookloan', 'amount', 'borrower'], 'integer'],
            [['state'], 'safe'],
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
        $query = debt::find();

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
            'evidencial_number' => $this->evidencial_number,
            'bookloan' => $this->bookloan,
            'amount' => $this->amount,
            'borrower' => $this->borrower,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
