<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Member;

/**
 * Membersearch represents the model behind the search form of `app\models\Member`.
 */
class Membersearch extends Member
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_number', 'mobile', 'active_reservation', 'active_loan', 'registrated_by'], 'integer'],
            [['adress', 'email', 'validity_of_registration', 'registration_status'], 'safe'],
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
        $query = Member::find();

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
            'name' => $this->name,
            'user_number' => $this->user_number,
            'mobile' => $this->mobile,
            'active_reservation' => $this->active_reservation,
            'active_loan' => $this->active_loan,
            'validity_of_registration' => $this->validity_of_registration,
            'registrated_by' => $this->registrated_by,
        ]);

        $query->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'registration_status', $this->registration_status]);

        return $dataProvider;
    }
}
