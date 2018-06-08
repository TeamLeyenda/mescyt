<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property int $id
 * @property string $pais
 * @property string $provincia
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
            [['pais', 'provincia'], 'required'],
            [['pais', 'provincia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pais' => 'Pais',
            'provincia' => 'Provincia',
        ];
    }
}
