<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Presentador_area_especializacion]].
 *
 * @see \app\models\Presentador_area_especializacion
 */
class Presentador_area_especializacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Presentador_area_especializacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Presentador_area_especializacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
