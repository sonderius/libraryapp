<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property string $name
 * @property string $position
 * @property int $contact
 * @property int $salary
 * @property int $staff_number
 * @property string $email
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Member[] $members
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position', 'contact', 'salary', 'staff_number', 'email', 'id', 'username', 'password', 'authKey', 'accessToken'], 'required'],
            [['name', 'position', 'email', 'username', 'password', 'authKey', 'accessToken'], 'string'],
            [['contact', 'salary', 'staff_number', 'id'], 'integer'],
            [['staff_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'position' => 'Position',
            'contact' => 'Contact',
            'salary' => 'Salary',
            'staff_number' => 'Staff Number',
            'email' => 'Email',
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::class, ['registrated_by' => 'staff_number']);
    }

    public function getAuth()
    {
        return "[
            '100' => [
                'id' => '100',
                'username' => 'admin',
                'password' => 'admin',
                'authKey' => 'test100key',
                'accessToken' => '100-token',
            ],
            '101' => [
                'id' => '101',
                'username' => 'demo',
                'password' => 'demo',
                'authKey' => 'test101key',
                'accessToken' => '101-token',
            ],
            '102' => [
                'id' => '102',
                'username' => 'demo2',
                'password' => 'demo2',
                'authKey' => 'test102key',
                'accessToken' => '102-token',
            ],
        ]";
    }
}
