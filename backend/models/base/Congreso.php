<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%congreso}}".
 *
 * @property integer $id
 * @property integer $provincia_id
 * @property string $Nombre
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 *
 * @property \backend\models\Conferencia[] $conferencias
 * @property \backend\models\Provincia $provincia
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
            'provincia'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provincia_id', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['provincia_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
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
        return '{{%congreso}}';
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
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha Inicio'),
            'Fecha_Final' => Yii::t('app', 'Fecha Final'),
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
    public function getProvincia()
    {
        return $this->hasOne(\backend\models\Provincia::className(), ['id' => 'provincia_id'])->inverseOf('congresos');
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
