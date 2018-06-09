<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sala".
 *
 * @property int $id
 * @property int $moderador_id
 * @property string $Nombre_Sala
 *
 * @property PresentadorSala[] $presentadorSalas
 * @property Presentador[] $presentadors
 * @property Moderador $moderador
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moderador_id', 'Nombre_Sala'], 'required'],
            [['moderador_id'], 'integer'],
            [['Nombre_Sala'], 'string', 'max' => 50],
            [['moderador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Moderador::className(), 'targetAttribute' => ['moderador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'moderador_id' => 'Moderador ID',
            'Nombre_Sala' => 'Nombre Sala',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorSalas()
    {
        return $this->hasMany(PresentadorSala::className(), ['sala_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['id' => 'presentador_id'])->viaTable('presentador_sala', ['sala_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModerador()
    {
        return $this->hasOne(Moderador::className(), ['id' => 'moderador_id']);
    }
}
