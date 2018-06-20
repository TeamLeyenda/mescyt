<?php

namespace backend\models;

use Yii;
use \backend\models\base\Afiliacion as BaseAfiliacion;

/**
 * This is the model class for table "afiliacion".
 */
class Afiliacion extends BaseAfiliacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Afiliacion'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
