<?php

declare(strict_types=1);

use yii\db\Migration;

class m220914_130131_create_mark_table extends Migration
{
    public const TABLE_NAME = 'mark';

    private string $table = '{{%' . self::TABLE_NAME . '}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Марка')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
