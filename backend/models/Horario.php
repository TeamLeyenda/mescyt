<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $id
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fecha_Inicio' => 'Fecha Inicio',
            'Fecha_Final' => 'Fecha Final',
        ];
    }
}
