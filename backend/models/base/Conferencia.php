<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%conferencia}}".
 *
 * @property integer $id
 * @property integer $congreso_id
 * @property string $Titulo
 * @property string $Institucion
 * @property string $Area_Tematica
 * @property string $Modalidad_Presentacion
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 *
 * @property \backend\models\Congreso $congreso
 * @property \backend\models\PresentadorConferencia[] $presentadorConferencias
 * @property \backend\models\Presentador[] $presentadors
 */
class Conferencia extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'congreso',
            'presentadorConferencias',
            'presentadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conferencia}}';
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
            'congreso_id' => Yii::t('app', 'Congreso ID'),
            'Titulo' => Yii::t('app', 'Titulo'),
            'Institucion' => Yii::t('app', 'Institucion'),
            'Area_Tematica' => Yii::t('app', 'Area Tematica'),
            'Modalidad_Presentacion' => Yii::t('app', 'Modalidad Presentacion'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha Inicio'),
            'Fecha_Final' => Yii::t('app', 'Fecha Final'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongreso()
    {
        return $this->hasOne(\backend\models\Congreso::className(), ['id' => 'congreso_id'])->inverseOf('conferencias');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorConferencias()
    {
        return $this->hasMany(\backend\models\PresentadorConferencia::className(), ['conferencia_id' => 'id'])->inverseOf('conferencia');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_conferencia}}', ['conferencia_id' => 'id']);
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
     * @return \app\models\ConferenciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ConferenciaQuery(get_called_class());
    }
}
