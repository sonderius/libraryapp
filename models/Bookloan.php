<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookloan".
 *
 * @property int $book
 * @property int|null $number_of_extensions
 * @property int $return date
 * @property int $register_number
 * @property int $creation_date
 * @property int $borrower
 *
 * @property Book $book0
 * @property Member $borrower0
 * @property Debt[] $debts
 */
class Bookloan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookloan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book', 'return date', 'register_number', 'creation_date', 'borrower'], 'required'],
            [['book', 'number_of_extensions', 'return date', 'register_number', 'creation_date', 'borrower'], 'integer'],
            [['register_number'], 'unique'],
            [['borrower'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['borrower' => 'user_number']],
            [['book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book' => 'Book',
            'number_of_extensions' => 'Number Of Extensions',
            'return date' => 'Return Date',
            'register_number' => 'Register Number',
            'creation_date' => 'Creation Date',
            'borrower' => 'Borrower',
        ];
    }

    /**
     * Gets query for [[Book0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook0()
    {
        return $this->hasOne(Book::class, ['id' => 'book']);
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

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debt::class, ['bookloan' => 'register_number']);
    }
}
