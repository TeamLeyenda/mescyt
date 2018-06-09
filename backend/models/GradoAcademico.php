<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grado_academico".
 *
 * @property int $id
 * @property string $Grado
 */
class GradoAcademico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grado_academico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Grado'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Grado' => 'Grado',
        ];
    }
}
