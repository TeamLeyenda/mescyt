<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Presentador]].
 *
 * @see \app\models\Presentador
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
     * @return \app\models\Presentador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Presentador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
