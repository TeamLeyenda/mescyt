<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "imagen".
 *
 * @property int $id
 * @property resource $Perfil
 * @property string $Nombre_Imagen
 * @property int $Tamano
 * @property string $Tipo
 * @property string $Ruta
 *
 * @property Presentador[] $presentadors
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
            [['Perfil'], 'string'],
            [['Tamano'], 'integer'],
            [['Nombre_Imagen', 'Ruta'], 'string', 'max' => 255],
            [['Tipo'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['imagen_id' => 'id']);
    }
}
