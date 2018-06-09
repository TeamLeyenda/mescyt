<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presentador_sala".
 *
 * @property int $presentador_id
 * @property int $sala_id
 *
 * @property Presentador $presentador
 * @property Sala $sala
 */
class PresentadorSala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentador_sala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id', 'sala_id'], 'required'],
            [['presentador_id', 'sala_id'], 'integer'],
            [['presentador_id', 'sala_id'], 'unique', 'targetAttribute' => ['presentador_id', 'sala_id']],
            [['presentador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Presentador::className(), 'targetAttribute' => ['presentador_id' => 'id']],
            [['sala_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['sala_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'presentador_id' => 'Presentador ID',
            'sala_id' => 'Sala ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(Sala::className(), ['id' => 'sala_id']);
    }
}
