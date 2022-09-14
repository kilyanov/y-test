<?php

declare(strict_types=1);

namespace app\common\parse\models;

interface ObserverInterface
{
    public function load(): void;
}
