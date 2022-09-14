<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\GearType;

class GearTypeObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = GearType::class;
        $this->nameIndex = 'gear-type';
        $this->returnIndex = 'gearTypeId';
        $this->data = $data;
    }

}
