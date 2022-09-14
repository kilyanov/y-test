<?php

declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gear_type}}`.
 */
class m220914_130848_create_gear_type_table extends Migration
{
    public const TABLE_NAME = 'gear_type';

    private string $table = '{{%' . self::TABLE_NAME . '}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->comment('Тип привода')
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
