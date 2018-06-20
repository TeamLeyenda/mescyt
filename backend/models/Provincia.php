<?php

namespace backend\models;

use Yii;
use \backend\models\base\Provincia as BaseProvincia;

/**
 * This is the model class for table "provincia".
 */
class Provincia extends BaseProvincia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['pais_id', 'Provincia'], 'required'],
            [['pais_id'], 'integer'],
            [['Provincia'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
