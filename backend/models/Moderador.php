<?php

namespace backend\models;

use Yii;
use \backend\models\base\Moderador as BaseModerador;

/**
 * This is the model class for table "moderador".
 */
class Moderador extends BaseModerador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre'], 'required'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
