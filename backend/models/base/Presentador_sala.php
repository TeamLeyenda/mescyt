<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%presentador_sala}}".
 *
 * @property integer $presentador_id
 * @property integer $sala_id
 *
 * @property \backend\models\Presentador $presentador
 * @property \backend\models\Sala $sala
 */
class Presentador_sala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentador',
            'sala'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentador_id', 'sala_id'], 'required'],
            [['presentador_id', 'sala_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentador_sala}}';
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
            'sala_id' => Yii::t('app', 'Sala ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->inverseOf('presentadorSalas');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(\backend\models\Sala::className(), ['id' => 'sala_id'])->inverseOf('presentadorSalas');
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
     * @return \app\models\Presentador_salaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Presentador_salaQuery(get_called_class());
    }
}
