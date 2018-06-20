<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentador_area_especializacion as BasePresentador_area_especializacion;

/**
 * This is the model class for table "presentador_area_especializacion".
 */
class Presentador_area_especializacion extends BasePresentador_area_especializacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentador_id', 'area_especializacion_id'], 'required'],
            [['presentador_id', 'area_especializacion_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
