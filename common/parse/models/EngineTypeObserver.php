<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\EngineType;

class EngineTypeObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = EngineType::class;
        $this->nameIndex = 'engine-type';
        $this->returnIndex = 'engineTypeId';
        $this->data = $data;
    }

}
