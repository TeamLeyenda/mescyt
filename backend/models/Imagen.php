<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "imagen".
 *
 * @property int $id
 * @property int $presentador_id
 * @property resource $Perfil
 * @property string $Nombre_Imagen
 * @property int $Tamano
 * @property string $Tipo
 * @property string $Ruta
 *
 * @property Presentador $presentador
 */
class Imagen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id'], 'required'],
            [['presentador_id', 'Tamano'], 'integer'],
            [['Perfil'], 'string'],
            [['Nombre_Imagen', 'Ruta'], 'string', 'max' => 255],
            [['Tipo'], 'string', 'max' => 8],
            [['presentador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Presentador::className(), 'targetAttribute' => ['presentador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'presentador_id' => 'Presentador ID',
            'Perfil' => 'Perfil',
            'Nombre_Imagen' => 'Nombre Imagen',
            'Tamano' => 'Tamano',
            'Tipo' => 'Tipo',
            'Ruta' => 'Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }
}
