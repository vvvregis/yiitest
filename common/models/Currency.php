<?php


namespace common\models;

/**
 * Class Currency
 * @package common\models
 */
class Currency extends generation\Currency
{

    /**
     * Insert or update currency
     * @param $currency
     */
    public static function updateRow($currency)
    {
        if (!$updatedRow = self::find()->where(['code' => $currency->CharCode])->one()) {
            $updatedRow = new self();
            $updatedRow->name = strval($currency->Name);
            $updatedRow->code = strval($currency->CharCode);

        }

        /*TODO У некоторых валют указан номинал не единицы к рублю, а 10 или 100, для работы функционала с учетом
           номинала, нужно изменить следующую строку на

        $updatedRow->rate = floatval($currency->Value / $currency->Nominal );
        */

        $updatedRow->rate = floatval($currency->Value);
        $updatedRow->save();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function getCurrencyById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
}