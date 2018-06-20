<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Pesentador_conferencia]].
 *
 * @see \app\models\Pesentador_conferencia
 */
class Pesentador_conferenciaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Pesentador_conferencia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Pesentador_conferencia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
