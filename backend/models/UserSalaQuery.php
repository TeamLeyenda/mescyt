<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UserSala]].
 *
 * @see UserSala
 */
class UserSalaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserSala[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserSala|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
