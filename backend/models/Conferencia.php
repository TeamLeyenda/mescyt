<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id
 * @property int $congreso_id
 * @property int $horario_id
 * @property string $Tema
 */
class Conferencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conferencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['congreso_id', 'horario_id', 'Tema'], 'required'],
            [['congreso_id', 'horario_id'], 'integer'],
            [['Tema'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'congreso_id' => 'Congreso ID',
            'horario_id' => 'Horario ID',
            'Tema' => 'Tema',
        ];
    }
}
