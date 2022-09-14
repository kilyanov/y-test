<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\Transmission;

class TransmissionObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = Transmission::class;
        $this->nameIndex = 'transmission';
        $this->returnIndex = 'transmissionId';
        $this->data = $data;
    }

}
