<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "congreso".
 *
 * @property int $id
 * @property int $ubicacion_id
 * @property int $horario_id
 * @property string $Nombre
 *
 * @property Conferencia[] $conferencias
 * @property Horario $horario
 * @property Ubicacion $ubicacion
 */
class Congreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ubicacion_id', 'horario_id'], 'required'],
            [['ubicacion_id', 'horario_id'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['horario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['horario_id' => 'id']],
            [['ubicacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ubicacion::className(), 'targetAttribute' => ['ubicacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ubicacion_id' => 'Ubicacion ID',
            'horario_id' => 'Horario ID',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencias()
    {
        return $this->hasMany(Conferencia::className(), ['congreso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(Horario::className(), ['id' => 'horario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['id' => 'ubicacion_id']);
    }
}
