<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property int $id
 * @property string $test
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test' => 'Test',
        ];
    }
}
