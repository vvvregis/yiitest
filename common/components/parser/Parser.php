<?php


namespace common\components\parser;


use common\models\Currency;

class Parser implements ParserInterface
{

    /**
     * Url сайта с которого осуществляется парсинг
     */
    const URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    const NO_XML_ERROR = 'Not found data';
    const NOT_VALID_FORMAT = 'Not valid data format';
    const NO_ERRORS = 'Data Parsed';

    /**
     * Парсит данные с сайта
     * @return string
     */
    public function update()
    {
        $xml = file_get_contents(self::URL);
        if(!$xml) {
            return self::NO_XML_ERROR;
        }
        $xmlObject = new \SimpleXMLElement($xml);
        if($xmlObject && $xmlObject->Valute) {
            foreach ($xmlObject->Valute as $currency) {
                $row = Currency::updateRow($currency);
            }
        } else {
            return self::NOT_VALID_FORMAT;
        }

        return self::NO_ERRORS;
    }
}