<?php


namespace frontend\controllers;


use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

/**
 * Class CurrencyController
 * @package frontend\controllers
 */
class CurrencyController extends ActiveController
{

    /**
     * @var string
     */
    public $modelClass = 'common\models\Currency';

    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
        ];
        return $behaviors;
    }

}