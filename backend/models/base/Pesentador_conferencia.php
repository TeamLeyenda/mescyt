<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%presentador_conferencia}}".
 *
 * @property integer $presentador_id
 * @property integer $conferencia_id
 *
 * @property \backend\models\Conferencia $conferencia
 * @property \backend\models\Presentador $presentador
 */
class Pesentador_conferencia extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'conferencia',
            'presentador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentador_id', 'conferencia_id'], 'required'],
            [['presentador_id', 'conferencia_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentador_conferencia}}';
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
            'conferencia_id' => Yii::t('app', 'Conferencia ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencia()
    {
        return $this->hasOne(\backend\models\Conferencia::className(), ['id' => 'conferencia_id'])->inverseOf('pesentadorConferencias');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->inverseOf('pesentadorConferencias');
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
     * @return \app\models\Pesentador_conferenciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Pesentador_conferenciaQuery(get_called_class());
    }
}
