<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%transmission}}".
 *
 * @property int $id
 * @property string|null $name Трансмиссия
 *
 * @property Catalog[] $catalogs
 */
class Transmission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%transmission}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Трансмиссия',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::class, ['transmissionId' => 'id']);
    }
}
