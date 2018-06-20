<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%participante}}".
 *
 * @property integer $id
 * @property integer $afiliacion_id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 *
 * @property \backend\models\Afiliacion $afiliacion
 * @property \backend\models\User[] $users
 */
class Participante extends \yii\db\ActiveRecord
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
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'Nombre'], 'required'],
            [['afiliacion_id'], 'integer'],
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
        return '{{%participante}}';
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
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(\backend\models\Afiliacion::className(), ['id' => 'afiliacion_id'])->inverseOf('participantes');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['participante_id' => 'id'])->inverseOf('participante');
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
     * @return \app\models\ParticipanteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ParticipanteQuery(get_called_class());
    }
}
