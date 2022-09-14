<?php

declare(strict_types=1);

namespace app\common\service;

use app\common\parse\ParseInterface;
use yii\base\Component;

class CatalogService extends Component
{
    private ParseInterface $parser;
    private array $deleteIds = [];

    public function __construct(ParseInterface $parser,$config = [])
    {
        $this->parser = $parser;
        parent::__construct($config);
    }

    public function checkData(string $file)
    {
        foreach ($this->parser->parse($file) as $data) {
            $data = $this->parser->extract($data);
        }
    }

}
