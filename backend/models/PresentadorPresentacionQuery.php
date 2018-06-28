<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PresentadorPresentacion]].
 *
 * @see PresentadorPresentacion
 */
class PresentadorPresentacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresentadorPresentacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresentadorPresentacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}