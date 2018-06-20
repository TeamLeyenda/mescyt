<?php

namespace backend\models;

use Yii;
use \backend\models\base\Conferencia as BaseConferencia;

/**
 * This is the model class for table "conferencia".
 */
class Conferencia extends BaseConferencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
