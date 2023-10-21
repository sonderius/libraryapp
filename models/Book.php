<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property string $state
 * @property int $id
 * @property string $availability
 * @property string $limitation
 * @property int $ISBN
 *
 * @property Bookloan[] $bookloans
 * @property Books $iSBN
 * @property Reservation[] $reservations
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'id', 'availability', 'limitation', 'ISBN'], 'required'],
            [['state', 'availability', 'limitation'], 'string'],
            [['id', 'ISBN'], 'integer'],
            [['id'], 'unique'],
            [['ISBN'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['ISBN' => 'ISBN']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'state' => 'State',
            'id' => 'ID',
            'availability' => 'Availability',
            'limitation' => 'Limitation',
            'ISBN' => 'Isbn',
        ];
    }

    /**
     * Gets query for [[Bookloans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookloans()
    {
        return $this->hasMany(Bookloan::class, ['book' => 'id']);
    }

    /**
     * Gets query for [[ISBN]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getISBN()
    {
        return $this->hasOne(Books::class, ['ISBN' => 'ISBN']);
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::class, ['book' => 'id']);
    }
}
