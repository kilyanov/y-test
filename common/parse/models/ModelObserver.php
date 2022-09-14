<?php

declare(strict_types=1);

namespace app\common\parse\models;

use app\models\Model;

class ModelObserver extends DataAbstract
{
    public function __construct(array $data)
    {
        $this->callClass = Model::class;
        $this->nameIndex = 'model';
        $this->returnIndex = 'modelId';
        $this->data = $data;
    }

}
