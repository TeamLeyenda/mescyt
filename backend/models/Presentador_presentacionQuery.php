<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Presentador_presentacion]].
 *
 * @see Presentador_presentacion
 */
class Presentador_presentacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Presentador_presentacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Presentador_presentacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}