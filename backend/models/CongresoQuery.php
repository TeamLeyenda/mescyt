<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Congreso]].
 *
 * @see \app\models\Congreso
 */
class CongresoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Congreso[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Congreso|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
