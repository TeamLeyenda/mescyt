<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "moderador".
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 * @property string $Correo
 *
 * @property Sala[] $salas
 */
class Moderador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moderador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Correo'], 'required'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['Correo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Telefono' => 'Telefono',
            'Correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['moderador_id' => 'id']);
    }
}
