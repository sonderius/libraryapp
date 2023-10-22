<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $name
 * @property int $user_number
 * @property string $adress
 * @property int $mobile
 * @property string $email
 * @property int $active_reservation
 * @property int $active_loan
 * @property string $validity_of_registration
 * @property string $registration_status
 * @property int $registrated_by
 *
 * @property Bookloan[] $bookloans
 * @property Debt[] $debts
 * @property Staff $registratedBy
 * @property Reservation[] $reservations
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_number', 'adress', 'mobile', 'email', 'active_reservation', 'active_loan', 'validity_of_registration', 'registration_status', 'registrated_by'], 'required'],
            [['name', 'user_number', 'mobile', 'active_reservation', 'active_loan', 'registrated_by'], 'integer'],
            [['adress', 'email', 'registration_status'], 'string'],
            [['validity_of_registration'], 'safe'],
            [['user_number'], 'unique'],
            [['registrated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['registrated_by' => 'staff_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'user_number' => 'User Number',
            'adress' => 'Adress',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'active_reservation' => 'Active Reservation',
            'active_loan' => 'Active Loan',
            'validity_of_registration' => 'Validity Of Registration',
            'registration_status' => 'Registration Status',
            'registrated_by' => 'Registrated By',
        ];
    }

    /**
     * Gets query for [[Bookloans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookloans()
    {
        return $this->hasMany(Bookloan::class, ['borrower' => 'user_number']);
    }

    /**
     * Gets query for [[Debts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDebts()
    {
        return $this->hasMany(Debt::class, ['borrower' => 'user_number']);
    }

    /**
     * Gets query for [[RegistratedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistratedBy()
    {
        return $this->hasOne(Staff::class, ['staff_number' => 'registrated_by']);
    }

    /**
     * Gets query for [[Reservations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::class, ['reservator' => 'user_number']);
    }
}
