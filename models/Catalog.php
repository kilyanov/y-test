<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property int $id
 * @property int $markId Марка
 * @property int $modelId Модель
 * @property int|null $generationId Поколение
 * @property int $year Год выпуска
 * @property int $run Пробег
 * @property int $colorId Цвет
 * @property int $bodyTypeId Кузов
 * @property int $engineTypeId Тип двигателя
 * @property int $transmissionId Трансмиссия
 * @property int $gearTypeId Тип двигателя
 * @property int $generation_id Generation id
 *
 * @property BodyType $bodyType
 * @property Color $color
 * @property EngineType $engineType
 * @property GearType $gearType
 * @property Generation $generation
 * @property Mark $mark
 * @property Model $model
 * @property Transmission $transmission
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['markId', 'modelId', 'year', 'run', 'colorId', 'bodyTypeId', 'engineTypeId', 'transmissionId', 'gearTypeId'], 'required'],
            [['markId', 'modelId', 'generationId', 'year', 'run', 'colorId', 'bodyTypeId', 'engineTypeId', 'transmissionId', 'gearTypeId', 'generation_id'], 'integer'],
            [['bodyTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => BodyType::class, 'targetAttribute' => ['bodyTypeId' => 'id']],
            [['colorId'], 'exist', 'skipOnError' => true, 'targetClass' => Color::class, 'targetAttribute' => ['colorId' => 'id']],
            [['engineTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => EngineType::class, 'targetAttribute' => ['engineTypeId' => 'id']],
            [['gearTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => GearType::class, 'targetAttribute' => ['gearTypeId' => 'id']],
            [['generationId'], 'exist', 'skipOnError' => true, 'targetClass' => Generation::class, 'targetAttribute' => ['generationId' => 'id']],
            [['markId'], 'exist', 'skipOnError' => true, 'targetClass' => Mark::class, 'targetAttribute' => ['markId' => 'id']],
            [['modelId'], 'exist', 'skipOnError' => true, 'targetClass' => Model::class, 'targetAttribute' => ['modelId' => 'id']],
            [['transmissionId'], 'exist', 'skipOnError' => true, 'targetClass' => Transmission::class, 'targetAttribute' => ['transmissionId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'markId' => 'Марка',
            'modelId' => 'Модель',
            'generationId' => 'Поколение',
            'year' => 'Год выпуска',
            'run' => 'Пробег',
            'colorId' => 'Цвет',
            'bodyTypeId' => 'Кузов',
            'engineTypeId' => 'Тип двигателя',
            'transmissionId' => 'Трансмиссия',
            'gearTypeId' => 'Тип двигателя',
            'generation_id' => 'Generation id',
        ];
    }

    /**
     * Gets query for [[BodyType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodyType()
    {
        return $this->hasOne(BodyType::class, ['id' => 'bodyTypeId']);
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'colorId']);
    }

    /**
     * Gets query for [[EngineType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngineType()
    {
        return $this->hasOne(EngineType::class, ['id' => 'engineTypeId']);
    }

    /**
     * Gets query for [[GearType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGearType()
    {
        return $this->hasOne(GearType::class, ['id' => 'gearTypeId']);
    }

    /**
     * Gets query for [[Generation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id' => 'generationId']);
    }

    /**
     * Gets query for [[Mark]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMark()
    {
        return $this->hasOne(Mark::class, ['id' => 'markId']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'modelId']);
    }

    /**
     * Gets query for [[Transmission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransmission()
    {
        return $this->hasOne(Transmission::class, ['id' => 'transmissionId']);
    }
}
