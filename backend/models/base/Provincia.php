<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%provincia}}".
 *
 * @property integer $id
 * @property integer $pais_id
 * @property string $Provincia
 *
 * @property \backend\models\Congreso[] $congresos
 * @property \backend\models\Pais $pais
 */
class Provincia extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'congresos',
            'pais'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais_id', 'Provincia'], 'required'],
            [['pais_id'], 'integer'],
            [['Provincia'], 'string', 'max' => 100],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%provincia}}';
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
            'pais_id' => Yii::t('app', 'Pais ID'),
            'Provincia' => Yii::t('app', 'Provincia'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongresos()
    {
        return $this->hasMany(\backend\models\Congreso::className(), ['provincia_id' => 'id'])->inverseOf('provincia');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(\backend\models\Pais::className(), ['id' => 'pais_id'])->inverseOf('provincias');
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
     * @return \app\models\ProvinciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProvinciaQuery(get_called_class());
    }
}
