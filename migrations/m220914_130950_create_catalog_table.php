<?php

declare(strict_types=1);

use yii\db\Migration;

class m220914_130950_create_catalog_table extends Migration
{
    public const TABLE_NAME = 'catalog';

    private string $table = '{{%' . self::TABLE_NAME . '}}';
    private string $mark = '{{%mark}}';
    private string $model = '{{%model}}';
    private string $generation = '{{%generation}}';
    private string $color = '{{%color}}';
    private string $body_type = '{{%body_type}}';
    private string $engine_type = '{{%engine_type}}';
    private string $transmission = '{{%transmission}}';
    private string $gear_type = '{{%gear_type}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->bigPrimaryKey(),
            'markId' => $this->integer()->notNull()->comment('Марка'),
            'modelId' => $this->integer()->notNull()->comment('Модель'),
            'generationId' => $this->integer()->null()->defaultValue(null)->comment('Поколение'),
            'year' => $this->integer()->notNull()->comment('Год выпуска'),
            'run' => $this->integer()->notNull()->comment('Пробег'),
            'colorId' => $this->integer()->notNull()->comment('Цвет'),
            'bodyTypeId' => $this->integer()->notNull()->comment('Кузов'),
            'engineTypeId' => $this->integer()->notNull()->comment('Тип двигателя'),
            'transmissionId' => $this->integer()->notNull()->comment('Трансмиссия'),
            'gearTypeId' => $this->integer()->notNull()->comment('Тип двигателя'),
            'generation_id' => $this->bigInteger()->null()->defaultValue(null)->comment('Generation id'),
        ]);
        $this->createIndex(
            'idx-markId-' . self::TABLE_NAME,
            $this->table,
            'markId'
        );
        $this->addForeignKey(
            'fk-markId-' . self::TABLE_NAME,
            $this->table,
            'markId',
            $this->mark,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-modelId-' . self::TABLE_NAME,
            $this->table,
            'modelId'
        );
        $this->addForeignKey(
            'fk-modelId-' . self::TABLE_NAME,
            $this->table,
            'modelId',
            $this->model,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-generationId-' . self::TABLE_NAME,
            $this->table,
            'generationId'
        );
        $this->addForeignKey(
            'fk-generationId-' . self::TABLE_NAME,
            $this->table,
            'generationId',
            $this->generation,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-colorId-' . self::TABLE_NAME,
            $this->table,
            'colorId'
        );
        $this->addForeignKey(
            'fk-colorId-' . self::TABLE_NAME,
            $this->table,
            'colorId',
            $this->color,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-bodyTypeId-' . self::TABLE_NAME,
            $this->table,
            'bodyTypeId'
        );
        $this->addForeignKey(
            'fk-bodyTypeId-' . self::TABLE_NAME,
            $this->table,
            'bodyTypeId',
            $this->body_type,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-engineTypeId-' . self::TABLE_NAME,
            $this->table,
            'engineTypeId'
        );
        $this->addForeignKey(
            'fk-engineTypeId-' . self::TABLE_NAME,
            $this->table,
            'engineTypeId',
            $this->engine_type,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-transmissionId-' . self::TABLE_NAME,
            $this->table,
            'transmissionId'
        );
        $this->addForeignKey(
            'fk-transmissionId-' . self::TABLE_NAME,
            $this->table,
            'transmissionId',
            $this->transmission,
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-gearTypeId-' . self::TABLE_NAME,
            $this->table,
            'gearTypeId'
        );
        $this->addForeignKey(
            'fk-gearTypeId-' . self::TABLE_NAME,
            $this->table,
            'gearTypeId',
            $this->gear_type,
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-markId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-modelId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-generationId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-colorId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-bodyTypeId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-engineTypeId-' . self::TABLE_NAME, $this->table);
        $this->dropForeignKey('fk-gearTypeId-' . self::TABLE_NAME, $this->table);
        $this->dropTable($this->table);
    }
}
