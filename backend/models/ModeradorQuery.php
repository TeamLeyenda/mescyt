<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Moderador]].
 *
 * @see Moderador
 */
class ModeradorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Moderador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Moderador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}