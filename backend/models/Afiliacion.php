<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "afiliacion".
 *
 * @property int $id
 * @property string $Afiliacion
 *
 * @property Participante[] $participantes
 * @property Presentador[] $presentadors
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasMany(Participante::className(), ['afiliacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['afiliacion_id' => 'id']);
    }
}