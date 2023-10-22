<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debt".
 *
 * @property int $evidencial_number
 * @property int $bookloan
 * @property int $amount
 * @property string $state
 * @property int $borrower
 *
 * @property Bookloan $bookloan0
 * @property Member $borrower0
 */
class Debt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'debt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evidencial_number', 'bookloan', 'amount', 'state', 'borrower'], 'required'],
            [['evidencial_number', 'bookloan', 'amount', 'borrower'], 'integer'],
            [['state'], 'string'],
            [['evidencial_number'], 'unique'],
            [['borrower'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['borrower' => 'user_number']],
            [['bookloan'], 'exist', 'skipOnError' => true, 'targetClass' => Bookloan::class, 'targetAttribute' => ['bookloan' => 'register_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evidencial_number' => 'Evidencial Number',
            'bookloan' => 'Bookloan',
            'amount' => 'Amount',
            'state' => 'State',
            'borrower' => 'Borrower',
        ];
    }

    /**
     * Gets query for [[Bookloan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookloan0()
    {
        return $this->hasOne(Bookloan::class, ['register_number' => 'bookloan']);
    }

    /**
     * Gets query for [[Borrower0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrower0()
    {
        return $this->hasOne(Member::class, ['user_number' => 'borrower']);
    }
}
