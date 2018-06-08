<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "congreso".
 *
 * @property int $id_congreso
 * @property string $Nombre
 */
class Congreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_congreso', 'Nombre'], 'required'],
            [['id_congreso'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_congreso' => 'Id Congreso',
            'Nombre' => 'Nombre',
        ];
    }
}
