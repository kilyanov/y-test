<?php

declare(strict_types=1);

use yii\db\Migration;

class m220914_130730_create_engine_type_table extends Migration
{
    public const TABLE_NAME = 'engine_type';

    private string $table = '{{%' . self::TABLE_NAME . '}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Тип двигателя')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
