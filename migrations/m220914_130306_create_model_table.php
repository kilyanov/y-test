<?php

declare(strict_types=1);

use yii\db\Migration;

class m220914_130306_create_model_table extends Migration
{
    public const TABLE_NAME = 'model';

    private string $table = '{{%' . self::TABLE_NAME . '}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Модель')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
