<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%presentador}}".
 *
 * @property integer $id
 * @property integer $afiliacion_id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 * @property string $Descripcion
 *
 * @property \backend\models\Afiliacion $afiliacion
 * @property \backend\models\PresentadorAreaEspecializacion[] $presentadorAreaEspecializacions
 * @property \backend\models\AreaEspecializacion[] $areaEspecializacions
 * @property \backend\models\PresentadorConferencia[] $presentadorConferencias
 * @property \backend\models\Conferencia[] $conferencias
 * @property \backend\models\PresentadorGradoAcademico[] $presentadorGradoAcademicos
 * @property \backend\models\GradoAcademico[] $gradoAcademicos
 * @property \backend\models\PresentadorSala[] $presentadorSalas
 * @property \backend\models\Sala[] $salas
 * @property \backend\models\User[] $users
 */
class Presentador extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'afiliacion',
            'presentadorAreaEspecializacions',
            'areaEspecializacions',
            'presentadorConferencias',
            'conferencias',
            'presentadorGradoAcademicos',
            'gradoAcademicos',
            'presentadorSalas',
            'salas',
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'Nombre', 'Descripcion'], 'required'],
            [['afiliacion_id'], 'integer'],
            [['Descripcion'], 'string'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentador}}';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'afiliacion_id' => Yii::t('app', 'Afiliacion ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Telefono' => Yii::t('app', 'Telefono'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(\backend\models\Afiliacion::className(), ['id' => 'afiliacion_id'])->inverseOf('presentadors');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\PresentadorAreaEspecializacion::className(), ['presentador_id' => 'id'])->inverseOf('presentador');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\AreaEspecializacion::className(), ['id' => 'area_especializacion_id'])->viaTable('{{%presentador_area_especializacion}}', ['presentador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorConferencias()
    {
        return $this->hasMany(\backend\models\PresentadorConferencia::className(), ['presentador_id' => 'id'])->inverseOf('presentador');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencias()
    {
        return $this->hasMany(\backend\models\Conferencia::className(), ['id' => 'conferencia_id'])->viaTable('{{%presentador_conferencia}}', ['presentador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorGradoAcademicos()
    {
        return $this->hasMany(\backend\models\PresentadorGradoAcademico::className(), ['presentador_id' => 'id'])->inverseOf('presentador');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademicos()
    {
        return $this->hasMany(\backend\models\GradoAcademico::className(), ['id' => 'grado_academico_id'])->viaTable('{{%presentador_grado_academico}}', ['presentador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorSalas()
    {
        return $this->hasMany(\backend\models\PresentadorSala::className(), ['presentador_id' => 'id'])->inverseOf('presentador');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(\backend\models\Sala::className(), ['id' => 'sala_id'])->viaTable('{{%presentador_sala}}', ['presentador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['presentador_id' => 'id'])->inverseOf('presentador');
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\PresentadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresentadorQuery(get_called_class());
    }
}
