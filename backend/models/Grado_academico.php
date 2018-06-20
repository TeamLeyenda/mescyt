<?php

namespace backend\models;

use Yii;
use \backend\models\base\Grado_academico as BaseGrado_academico;

/**
 * This is the model class for table "grado_academico".
 */
class Grado_academico extends BaseGrado_academico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Grado'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
