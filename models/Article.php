<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $category_id Категория
 * @property string $name Название
 * @property string|null $description Описание
 * @property int $is_active Активность
 *
 * @property Category $category
 */
class Article extends \yii\db\ActiveRecord
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
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id', 'is_active'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'description' => 'Описание',
            'is_active' => 'Активна',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
}
