<?php

namespace backend\models;

use Yii;
use \backend\models\base\Participante as BaseParticipante;

/**
 * This is the model class for table "participante".
 */
class Participante extends BaseParticipante
{
    public $lock;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['afiliacion_id', 'Nombre'], 'required'],
            [['afiliacion_id'], 'integer'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
