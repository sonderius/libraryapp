<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookloan".
 *
 * @property int $book
 * @property int|null $number of extensions
 * @property int $return date
 * @property int $register number
 * @property int $creation date
 * @property int $borrower
 *
 * @property Book $book0
 * @property Member $borrower0
 * @property Fine[] $fines
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
            [['book', 'return date', 'register number', 'creation date', 'borrower'], 'required'],
            [['book', 'number of extensions', 'return date', 'register number', 'creation date', 'borrower'], 'integer'],
            [['register number'], 'unique'],
            [['borrower'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['borrower' => 'user number']],
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
            'number of extensions' => 'Number Of Extensions',
            'return date' => 'Return Date',
            'register number' => 'Register Number',
            'creation date' => 'Creation Date',
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
        return $this->hasOne(Member::class, ['user number' => 'borrower']);
    }

    /**
     * Gets query for [[Fines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFines()
    {
        return $this->hasMany(Fine::class, ['bookloan' => 'register number']);
    }
}
