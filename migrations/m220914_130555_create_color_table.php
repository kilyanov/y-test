<?php

declare(strict_types=1);

use yii\db\Migration;

class m220914_130555_create_color_table extends Migration
{
    public const TABLE_NAME = 'color';

    private string $table = '{{%' . self::TABLE_NAME . '}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Цвет')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
