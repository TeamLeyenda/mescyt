<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Presentador_grado_academico]].
 *
 * @see \app\models\Presentador_grado_academico
 */
class Presentador_grado_academicoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Presentador_grado_academico[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Presentador_grado_academico|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
