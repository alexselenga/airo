<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name Название
 * @property string|null $description Описание
 * @property int $is_active Активность
 *
 * @property Article[] $articles
 */
class Category extends \yii\db\ActiveRecord
{
    const STATES = [
        1 => 'Активна',
        0 => 'Не активна',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'is_active' => 'Активна',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery|ArticleQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    /**
     * Возвращает массив названий категорий.
     *
     * @return array
     */
    public static function getList() {
        return Category::find()->select('name')->indexBy('id')->column(); //->where(['is_active' => 1]) - для активных категорий
    }
}
