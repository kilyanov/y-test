<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\Generation;

class GenerationObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = Generation::class;
        $this->nameIndex = 'generation';
        $this->returnIndex = 'generationId';
        $this->data = $data;
    }

}
