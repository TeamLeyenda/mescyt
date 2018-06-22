<?php

namespace backend\models;

use Yii;
use \backend\models\base\Pesentador_conferencia as BasePesentador_conferencia;

/**
 * This is the model class for table "presentador_conferencia".
 */
class Pesentador_conferencia extends BasePesentador_conferencia
{
    public $lock;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentador_id', 'conferencia_id'], 'required'],
            [['presentador_id', 'conferencia_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
