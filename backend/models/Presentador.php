<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentador as BasePresentador;

/**
 * This is the model class for table "presentador".
 */
class Presentador extends BasePresentador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['afiliacion_id', 'Nombre', 'Correo', 'Descripcion'], 'required'],
            [['afiliacion_id'], 'integer'],
            [['Descripcion'], 'string'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['Correo'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
