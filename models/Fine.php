<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fine".
 *
 * @property int $evidencialnumber
 * @property int $bookloan
 * @property int $amount
 * @property string $state
 * @property int $borrower
 *
 * @property Bookloan $bookloan0
 * @property Member $borrower0
 */
class Fine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evidencialnumber', 'bookloan', 'amount', 'state', 'borrower'], 'required'],
            [['evidencialnumber', 'bookloan', 'amount', 'borrower'], 'integer'],
            [['state'], 'string'],
            [['evidencialnumber'], 'unique'],
            [['borrower'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['borrower' => 'user number']],
            [['bookloan'], 'exist', 'skipOnError' => true, 'targetClass' => Bookloan::class, 'targetAttribute' => ['bookloan' => 'register number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evidencialnumber' => 'Evidencialnumber',
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
        return $this->hasOne(Bookloan::class, ['register number' => 'bookloan']);
    }

    /**
     * Gets query for [[Borrower0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrower0()
    {
        return $this->hasOne(Member::class, ['user number' => 'borrower']);
    }
}
