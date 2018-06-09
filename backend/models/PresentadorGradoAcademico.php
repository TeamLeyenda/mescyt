<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presentador_grado_academico".
 *
 * @property int $presentador_id
 * @property int $grado_academico_id
 *
 * @property GradoAcademico $gradoAcademico
 * @property Presentador $presentador
 */
class PresentadorGradoAcademico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentador_grado_academico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id', 'grado_academico_id'], 'required'],
            [['presentador_id', 'grado_academico_id'], 'integer'],
            [['presentador_id', 'grado_academico_id'], 'unique', 'targetAttribute' => ['presentador_id', 'grado_academico_id']],
            [['grado_academico_id'], 'exist', 'skipOnError' => true, 'targetClass' => GradoAcademico::className(), 'targetAttribute' => ['grado_academico_id' => 'id']],
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
            'grado_academico_id' => 'Grado Academico ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademico()
    {
        return $this->hasOne(GradoAcademico::className(), ['id' => 'grado_academico_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }
}
