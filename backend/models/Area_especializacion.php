<?php

namespace backend\models;

use Yii;
use \backend\models\base\Area_especializacion as BaseArea_especializacion;

/**
 * This is the model class for table "area_especializacion".
 */
class Area_especializacion extends BaseArea_especializacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
