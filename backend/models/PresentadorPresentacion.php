<?php

namespace backend\models;

use \backend\models\base\PresentadorPresentacion as BasePresentadorPresentacion;

/**
 * This is the model class for table "presentador_presentacion".
 */
class PresentadorPresentacion extends BasePresentadorPresentacion
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
