<?php

declare(strict_types=1);

namespace app\common\service;

use app\common\parse\models\ObserverInterface;

interface CatalogObservableInterface
{
    public function attach(ObserverInterface $instance);

    public function detach(ObserverInterface $instance);

    public function load(array $data);
}
