<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Presentador]].
 *
 * @see Presentador
 */
class PresentadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Presentador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Presentador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}