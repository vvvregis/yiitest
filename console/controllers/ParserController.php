<?php
namespace console\controllers;

use common\components\parser\Parser;

/**
 * Class ParserController
 * @package console\controllers
 */
class ParserController extends \yii\console\Controller
{
    /**
     * Запустить парсер, команда php yii parser/start
     */
    public function actionStart()
    {
        echo (new Parser())->update() . PHP_EOL;
    }
}