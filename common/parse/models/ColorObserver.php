<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\Color;

class ColorObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = Color::class;
        $this->nameIndex = 'color';
        $this->returnIndex = 'colorId';
        $this->data = $data;
    }

}
