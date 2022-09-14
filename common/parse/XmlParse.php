<?php

declare(strict_types=1);

namespace app\common\parse;

use SbWereWolf\XmlNavigator\IConverter;
use SbWereWolf\XmlNavigator\NavigatorFabric;

class XmlParse implements ParseInterface
{

    /**
     * @throws \Exception
     */
    public function parse(string $filePath): array
    {
        $data = file_get_contents($filePath);
        $fabric = (new NavigatorFabric())->setXml($data);
        $converter = $fabric->makeConverter();
        $result = $converter->toArray();

        return $result['auto-catalog'][IConverter::ELEMENTS]['offers'][IConverter::ELEMENTS]['offer'][IConverter::MULTIPLE];
    }

    public function extract(array $data): array
    {
        return $data[IConverter::ELEMENTS];
    }

}
