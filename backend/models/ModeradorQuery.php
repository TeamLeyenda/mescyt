<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Moderador]].
 *
 * @see \app\models\Moderador
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
     * @return \app\models\Moderador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Moderador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
