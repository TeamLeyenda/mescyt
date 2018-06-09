<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "participante".
 *
 * @property int $id
 * @property int $afiliacion_id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 * @property string $Correo
 *
 * @property Afiliacion $afiliacion
 */
class Participante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'Nombre', 'Correo'], 'required'],
            [['afiliacion_id'], 'integer'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['Correo'], 'string', 'max' => 100],
            [['afiliacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Afiliacion::className(), 'targetAttribute' => ['afiliacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'afiliacion_id' => 'Afiliacion ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Telefono' => 'Telefono',
            'Correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(Afiliacion::className(), ['id' => 'afiliacion_id']);
    }
}
