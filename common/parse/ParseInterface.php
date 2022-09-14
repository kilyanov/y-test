<?php

declare(strict_types=1);

namespace app\common\parse;

interface ParseInterface
{
    public function parse(string $filePath): array;
}