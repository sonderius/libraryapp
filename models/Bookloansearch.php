<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookloan;

/**
 * Bookloansearch represents the model behind the search form of `app\models\Bookloan`.
 */
class Bookloansearch extends Bookloan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book', 'number_of_extensions', 'return_date', 'register_number', 'creation_date', 'borrower'], 'integer'],
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
        $query = Bookloan::find();

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
            'book' => $this->book,
            'number_of_extensions' => $this->number_of_extensions,
            'return_date' => $this->return_date,
            'register_number' => $this->register_number,
            'creation_date' => $this->creation_date,
            'borrower' => $this->borrower,
        ]);

        return $dataProvider;
    }
}
