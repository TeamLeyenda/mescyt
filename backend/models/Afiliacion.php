<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "afiliacion".
 *
 * @property int $id
 * @property string $Afiliacion
 */
class Afiliacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'afiliacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Afiliacion'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Afiliacion' => 'Afiliacion',
        ];
    }
}
