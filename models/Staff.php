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
            [['name', 'position', 'contact', 'salary', 'staff_number'], 'required'],
            [['name', 'position'], 'string'],
            [['contact', 'salary', 'staff_number'], 'integer'],
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
}
