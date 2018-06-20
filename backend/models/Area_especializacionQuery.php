<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Area_especializacion]].
 *
 * @see \app\models\Area_especializacion
 */
class Area_especializacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Area_especializacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Area_especializacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
