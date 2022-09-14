<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\BodyType;

class BodyTypeObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = BodyType::class;
        $this->nameIndex = 'body-type';
        $this->returnIndex = 'bodyTypeId';
        $this->data = $data;
    }

}
