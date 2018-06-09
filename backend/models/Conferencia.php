<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id
 * @property int $congreso_id
 * @property int $horario_id
 * @property string $titulo
 * @property string $institucion
 * @property string $area_tematica
 * @property string $modalidad_presentacion
 *
 * @property Congreso $congreso
 * @property Horario $horario
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
            [['congreso_id', 'horario_id', 'titulo', 'modalidad_presentacion'], 'required'],
            [['congreso_id', 'horario_id'], 'integer'],
            [['titulo', 'area_tematica'], 'string', 'max' => 100],
            [['institucion'], 'string', 'max' => 50],
            [['modalidad_presentacion'], 'string', 'max' => 20],
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
            'titulo' => 'Titulo',
            'institucion' => 'Institucion',
            'area_tematica' => 'Area Tematica',
            'modalidad_presentacion' => 'Modalidad Presentacion',
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
}
