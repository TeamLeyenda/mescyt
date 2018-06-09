<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property int $id
 * @property int $congreso_id
 * @property string $Pais
 * @property string $Provincia
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
            [['congreso_id', 'Pais', 'Provincia'], 'required'],
            [['congreso_id'], 'integer'],
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
            'congreso_id' => 'Congreso ID',
            'Pais' => 'Pais',
            'Provincia' => 'Provincia',
        ];
    }
}
