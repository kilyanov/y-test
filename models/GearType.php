<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%gear_type}}".
 *
 * @property int $id
 * @property string|null $name Тип привода
 *
 * @property Catalog[] $catalogs
 */
class GearType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gear_type}}';
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
            'name' => 'Тип привода',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::class, ['gearTypeId' => 'id']);
    }
}
