<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * Staffsearch represents the model behind the search form of `app\models\Staff`.
 */
class Staffsearch extends Staff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position', 'email', 'username', 'password', 'authKey', 'accessToken'], 'safe'],
            [['contact', 'salary', 'staff_number', 'id'], 'integer'],
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
        $query = Staff::find();

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
            'contact' => $this->contact,
            'salary' => $this->salary,
            'staff_number' => $this->staff_number,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken]);

        return $dataProvider;
    }
}
