<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%afiliacion}}".
 *
 * @property integer $id
 * @property string $Afiliacion
 *
 * @property \backend\models\Participante[] $participantes
 * @property \backend\models\Presentador[] $presentadors
 */
class Afiliacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'participantes',
            'presentadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Afiliacion'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%afiliacion}}';
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
            'Afiliacion' => Yii::t('app', 'Afiliacion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasMany(\backend\models\Participante::className(), ['afiliacion_id' => 'id'])->inverseOf('afiliacion');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['afiliacion_id' => 'id'])->inverseOf('afiliacion');
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
     * @return \app\models\AfiliacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AfiliacionQuery(get_called_class());
    }
}
