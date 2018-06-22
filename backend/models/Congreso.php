<?php

namespace backend\models;

use Yii;
use \backend\models\base\Congreso as BaseCongreso;

/**
 * This is the model class for table "congreso".
 */
class Congreso extends BaseCongreso
{
    public $lock;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['provincia_id', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['provincia_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Nombre'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
