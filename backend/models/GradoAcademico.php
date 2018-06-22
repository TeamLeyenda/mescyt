<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "grado_academico".
 *
 * @property int $id
 * @property string $Grado
 *
 * @property PresentadorGradoAcademico[] $presentadorGradoAcademicos
 * @property Presentador[] $presentadors
 */
class GradoAcademico extends \yii\db\ActiveRecord
{
    public $lock;
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorGradoAcademicos()
    {
        return $this->hasMany(PresentadorGradoAcademico::className(), ['grado_academico_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['id' => 'presentador_id'])->viaTable('presentador_grado_academico', ['grado_academico_id' => 'id']);
    }
}
