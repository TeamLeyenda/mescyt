<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presentador_conferencia".
 *
 * @property int $presentador_id
 * @property int $conferencia_id
 *
 * @property Conferencia $conferencia
 * @property Presentador $presentador
 */
class PresentadorConferencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentador_conferencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id', 'conferencia_id'], 'required'],
            [['presentador_id', 'conferencia_id'], 'integer'],
            [['presentador_id', 'conferencia_id'], 'unique', 'targetAttribute' => ['presentador_id', 'conferencia_id']],
            [['conferencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conferencia::className(), 'targetAttribute' => ['conferencia_id' => 'id']],
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
            'conferencia_id' => 'Conferencia ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencia()
    {
        return $this->hasOne(Conferencia::className(), ['id' => 'conferencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }
}
