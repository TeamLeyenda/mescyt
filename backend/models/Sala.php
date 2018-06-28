<?php

namespace backend\models;

use \backend\models\base\Sala as BaseSala;

/**
 * This is the model class for table "sala".
 */
class Sala extends BaseSala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['moderador_id', 'Nombre_Sala'], 'required'],
            [['moderador_id'], 'integer'],
            [['Nombre_Sala'], 'string', 'max' => 20]
        ]);
    }
	
}
