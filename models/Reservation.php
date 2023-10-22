<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property int $date
 * @property int $book
 * @property int $evidencial_number
 * @property string $date_expiration
 * @property int $reservator
 * @property int $staff
 *
 * @property Book $book0
 * @property Member $reservator0
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'book', 'evidencial_number', 'date_expiration', 'reservator', 'staff'], 'required'],
            [['date', 'book', 'evidencial_number', 'reservator', 'staff'], 'integer'],
            [['date_expiration'], 'safe'],
            [['evidencial_number'], 'unique'],
            [['book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book' => 'id']],
            [['reservator'], 'exist', 'skipOnError' => true, 'targetClass' => Member::class, 'targetAttribute' => ['reservator' => 'user_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Date',
            'book' => 'Book',
            'evidencial_number' => 'Evidencial Number',
            'date_expiration' => 'Date Expiration',
            'reservator' => 'Reservator',
            'staff' => 'Staff',
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
     * Gets query for [[Reservator0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservator0()
    {
        return $this->hasOne(Member::class, ['user_number' => 'reservator']);
    }
}
