<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id
 * @property int $congreso_id
 * @property int $horario_id
 * @property string $Titulo
 * @property string $Institucion
 * @property string $Area_Tematica
 * @property string $Modalidad_Presentacion
 *
 * @property Congreso $congreso
 * @property Horario $horario
 * @property PresentadorConferencia[] $presentadorConferencias
 * @property Presentador[] $presentadors
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
            [['congreso_id', 'horario_id', 'Titulo'], 'required'],
            [['congreso_id', 'horario_id'], 'integer'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['congreso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Congreso::className(), 'targetAttribute' => ['congreso_id' => 'id']],
            [['horario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horario::className(), 'targetAttribute' => ['horario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'congreso_id' => 'Congreso ID',
            'horario_id' => 'Horario ID',
            'Titulo' => 'Titulo',
            'Institucion' => 'Institucion',
            'Area_Tematica' => 'Area Tematica',
            'Modalidad_Presentacion' => 'Modalidad Presentacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongreso()
    {
        return $this->hasOne(Congreso::className(), ['id' => 'congreso_id']);
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
    public function getPresentadorConferencias()
    {
        return $this->hasMany(PresentadorConferencia::className(), ['conferencia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['id' => 'presentador_id'])->viaTable('presentador_conferencia', ['conferencia_id' => 'id']);
    }
}
