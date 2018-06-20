<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%area_especializacion}}".
 *
 * @property integer $id
 * @property string $area
 *
 * @property \backend\models\PresentadorAreaEspecializacion[] $presentadorAreaEspecializacions
 * @property \backend\models\Presentador[] $presentadors
 */
class Area_especializacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentadorAreaEspecializacions',
            'presentadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%area_especializacion}}';
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
            'area' => Yii::t('app', 'Area'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\PresentadorAreaEspecializacion::className(), ['area_especializacion_id' => 'id'])->inverseOf('areaEspecializacion');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_area_especializacion}}', ['area_especializacion_id' => 'id']);
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
     * @return \app\models\Area_especializacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Area_especializacionQuery(get_called_class());
    }
}
