<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property int $id
 * @property string $Pais
 * @property string $Provincia
 *
 * @property Congreso[] $congresos
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Pais', 'Provincia'], 'required'],
            [['Pais', 'Provincia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Pais' => 'Pais',
            'Provincia' => 'Provincia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongresos()
    {
        return $this->hasMany(Congreso::className(), ['ubicacion_id' => 'id']);
    }
}
