<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id_conferencia
 * @property int $id_presentador
 * @property string $Tema
 * @property string $Hora_Inicial
 * @property string $Hora_Final
 */
class Conferencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conferencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_conferencia', 'id_presentador', 'Tema', 'Hora_Inicial', 'Hora_Final'], 'required'],
            [['id_conferencia', 'id_presentador'], 'integer'],
            [['Hora_Inicial', 'Hora_Final'], 'safe'],
            [['Tema'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_conferencia' => 'Id Conferencia',
            'id_presentador' => 'Id Presentador',
            'Tema' => 'Tema',
            'Hora_Inicial' => 'Hora Inicial',
            'Hora_Final' => 'Hora Final',
        ];
    }
}
