<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "congreso".
 *
 * @property integer $id
 * @property integer $ubicacion_id
 * @property integer $horario_id
 * @property string $Nombre
 *
 * @property \backend\models\Conferencia[] $conferencias
 * @property \backend\models\Horario $horario
 * @property \backend\models\Ubicacion $ubicacion
 */
class Congreso extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'conferencias',
            'horario',
            'ubicacion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ubicacion_id', 'horario_id'], 'required'],
            [['ubicacion_id', 'horario_id'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'congreso';
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
            'ubicacion_id' => Yii::t('app', 'Ubicacion ID'),
            'horario_id' => Yii::t('app', 'Horario ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencias()
    {
        return $this->hasMany(\backend\models\Conferencia::className(), ['congreso_id' => 'id'])->inverseOf('congreso');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorario()
    {
        return $this->hasOne(\backend\models\Horario::className(), ['id' => 'horario_id'])->inverseOf('congresos');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacion()
    {
        return $this->hasOne(\backend\models\Ubicacion::className(), ['id' => 'ubicacion_id'])->inverseOf('congresos');
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
     * @return \app\models\CongresoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CongresoQuery(get_called_class());
    }
}
