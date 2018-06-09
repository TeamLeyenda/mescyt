<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "presentador".
 *
 * @property int $id
 * @property int $afiliacion_id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 * @property string $Correo
 * @property string $Descripcion
 *
 * @property Catalogo[] $catalogos
 * @property Afiliacion $afiliacion
 * @property PresentadorAreaEspecializacion[] $presentadorAreaEspecializacions
 * @property AreaEspecializacion[] $areaEspecializacions
 * @property PresentadorConferencia[] $presentadorConferencias
 * @property Conferencia[] $conferencias
 * @property PresentadorGradoAcademico[] $presentadorGradoAcademicos
 * @property GradoAcademico[] $gradoAcademicos
 * @property PresentadorSala[] $presentadorSalas
 * @property Sala[] $salas
 */
class Presentador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'Nombre', 'Correo', 'Descripcion'], 'required'],
            [['afiliacion_id'], 'integer'],
            [['Descripcion'], 'string'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['Correo'], 'string', 'max' => 100],
            [['afiliacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Afiliacion::className(), 'targetAttribute' => ['afiliacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'afiliacion_id' => 'Afiliacion ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Telefono' => 'Telefono',
            'Correo' => 'Correo',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogos()
    {
        return $this->hasMany(Catalogo::className(), ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(Afiliacion::className(), ['id' => 'afiliacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorAreaEspecializacions()
    {
        return $this->hasMany(PresentadorAreaEspecializacion::className(), ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacions()
    {
        return $this->hasMany(AreaEspecializacion::className(), ['id' => 'area_especializacion_id'])->viaTable('presentador_area_especializacion', ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorConferencias()
    {
        return $this->hasMany(PresentadorConferencia::className(), ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencias()
    {
        return $this->hasMany(Conferencia::className(), ['id' => 'conferencia_id'])->viaTable('presentador_conferencia', ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorGradoAcademicos()
    {
        return $this->hasMany(PresentadorGradoAcademico::className(), ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademicos()
    {
        return $this->hasMany(GradoAcademico::className(), ['id' => 'grado_academico_id'])->viaTable('presentador_grado_academico', ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorSalas()
    {
        return $this->hasMany(PresentadorSala::className(), ['presentador_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['id' => 'sala_id'])->viaTable('presentador_sala', ['presentador_id' => 'id']);
    }
}
