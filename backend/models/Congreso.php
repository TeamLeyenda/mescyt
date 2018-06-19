<?php

namespace backend\models;

use Yii;
use \backend\models\base\Congreso as BaseCongreso;

/**
 * This is the model class for table "congreso".
 */
class Congreso extends BaseCongreso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ubicacion_id', 'horario_id'], 'required'],
            [['ubicacion_id', 'horario_id'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
