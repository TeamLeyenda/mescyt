<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentacion as BasePresentacion;

/**
 * This is the model class for table "presentacion".
 */
class Presentacion extends BasePresentacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id', 'sala_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Archivo'], 'file'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['Vinculo'], 'string', 'max' => 255]
        ]);
    }
	
}
