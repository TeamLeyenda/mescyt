<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id
 * @property int $moderador_id
 * @property string $tema
 *
 * @property Moderador $moderador
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentacion';
    }

   
    


}
