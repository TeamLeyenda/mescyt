<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentador_grado_academico as BasePresentador_grado_academico;

/**
 * This is the model class for table "presentador_grado_academico".
 */
class Presentador_grado_academico extends BasePresentador_grado_academico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentador_id', 'grado_academico_id'], 'required'],
            [['presentador_id', 'grado_academico_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
