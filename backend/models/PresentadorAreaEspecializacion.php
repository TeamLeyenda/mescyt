<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presentador_area_especializacion".
 *
 * @property int $presentador_id
 * @property int $area_especializacion_id
 *
 * @property AreaEspecializacion $areaEspecializacion
 * @property Presentador $presentador
 */
class PresentadorAreaEspecializacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentador_area_especializacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id', 'area_especializacion_id'], 'required'],
            [['presentador_id', 'area_especializacion_id'], 'integer'],
            [['presentador_id', 'area_especializacion_id'], 'unique', 'targetAttribute' => ['presentador_id', 'area_especializacion_id']],
            [['area_especializacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => AreaEspecializacion::className(), 'targetAttribute' => ['area_especializacion_id' => 'id']],
            [['presentador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Presentador::className(), 'targetAttribute' => ['presentador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'presentador_id' => 'Presentador ID',
            'area_especializacion_id' => 'Area Especializacion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacion()
    {
        return $this->hasOne(AreaEspecializacion::className(), ['id' => 'area_especializacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }
}
