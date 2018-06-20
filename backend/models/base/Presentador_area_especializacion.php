<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%presentador_area_especializacion}}".
 *
 * @property integer $presentador_id
 * @property integer $area_especializacion_id
 *
 * @property \backend\models\AreaEspecializacion $areaEspecializacion
 * @property \backend\models\Presentador $presentador
 */
class Presentador_area_especializacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'areaEspecializacion',
            'presentador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentador_id', 'area_especializacion_id'], 'required'],
            [['presentador_id', 'area_especializacion_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentador_area_especializacion}}';
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
            'presentador_id' => Yii::t('app', 'Presentador ID'),
            'area_especializacion_id' => Yii::t('app', 'Area Especializacion ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacion()
    {
        return $this->hasOne(\backend\models\AreaEspecializacion::className(), ['id' => 'area_especializacion_id'])->inverseOf('presentadorAreaEspecializacions');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->inverseOf('presentadorAreaEspecializacions');
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
     * @return \app\models\Presentador_area_especializacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Presentador_area_especializacionQuery(get_called_class());
    }
}
