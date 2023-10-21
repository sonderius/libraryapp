<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property string $name
 * @property string $author
 * @property string $publishing
 * @property int $year of publication
 * @property int $ISBN
 *
 * @property Book[] $books
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'author', 'publishing', 'year of publication', 'ISBN'], 'required'],
            [['name', 'author', 'publishing'], 'string'],
            [['year of publication', 'ISBN'], 'integer'],
            [['ISBN'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'author' => 'Author',
            'publishing' => 'Publishing',
            'year of publication' => 'Year Of Publication',
            'ISBN' => 'Isbn',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['ISBN' => 'ISBN']);
    }
}
