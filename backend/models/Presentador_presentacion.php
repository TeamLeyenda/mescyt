<?php

namespace backend\models;

use \backend\models\base\Presentador_presentacion as BasePresentador_presentacion;

/**
 * This is the model class for table "presentador_presentacion".
 */
class Presentador_presentacion extends BasePresentador_presentacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentador_id', 'presentacion_id'], 'required'],
            [['presentador_id', 'presentacion_id'], 'integer']
        ]);
    }
	
}
