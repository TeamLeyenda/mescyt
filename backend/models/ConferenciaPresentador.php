<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conferencia_presentador".
 *
 * @property int $conferencia_id
 * @property int $presentador_id
 */
class ConferenciaPresentador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conferencia_presentador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conferencia_id', 'presentador_id'], 'required'],
            [['conferencia_id', 'presentador_id'], 'integer'],
            [['conferencia_id', 'presentador_id'], 'unique', 'targetAttribute' => ['conferencia_id', 'presentador_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'conferencia_id' => 'Conferencia ID',
            'presentador_id' => 'Presentador ID',
        ];
    }
}
