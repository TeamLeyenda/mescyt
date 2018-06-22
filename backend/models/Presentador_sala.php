<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentador_sala as BasePresentador_sala;

/**
 * This is the model class for table "presentador_sala".
 */
class Presentador_sala extends BasePresentador_sala
{
    public $lock;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentador_id', 'sala_id'], 'required'],
            [['presentador_id', 'sala_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
