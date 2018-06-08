<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $id_horario
 * @property int $id_presentador
 * @property int $id_congreso
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
            [['id_horario', 'id_presentador', 'id_congreso', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['id_horario', 'id_presentador', 'id_congreso'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_horario' => 'Id Horario',
            'id_presentador' => 'Id Presentador',
            'id_congreso' => 'Id Congreso',
            'Fecha_Inicio' => 'Fecha Inicio',
            'Fecha_Final' => 'Fecha Final',
        ];
    }
}
