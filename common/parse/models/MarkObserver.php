<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\Mark;

class MarkObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = Mark::class;
        $this->nameIndex = 'mark';
        $this->returnIndex = 'markId';
        $this->data = $data;
    }

}
