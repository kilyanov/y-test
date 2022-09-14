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

        return
            empty($result['auto-catalog'][IConverter::ELEMENTS]['offers'][IConverter::ELEMENTS]['offer'][IConverter::MULTIPLE]) ?
            [IConverter::ELEMENTS => $result['auto-catalog'][IConverter::ELEMENTS]['offers'][IConverter::ELEMENTS]['offer']] :
            $result['auto-catalog'][IConverter::ELEMENTS]['offers'][IConverter::ELEMENTS]['offer'][IConverter::MULTIPLE];
    }

    public function extract(array $data): array
    {
        $result = [];
        foreach ($data[IConverter::ELEMENTS] as $k => $value) {
            $result[$k] = array_key_exists(IConverter::VALUE, $value) ? $value[IConverter::VALUE] : null;
        }

        return $result;
    }

}
