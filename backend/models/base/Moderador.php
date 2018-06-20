<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%moderador}}".
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 *
 * @property \backend\models\Sala[] $salas
 * @property \backend\models\User[] $users
 */
class Moderador extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'salas',
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
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
        return '{{%moderador}}';
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
            'Nombre' => Yii::t('app', 'Nombre'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Telefono' => Yii::t('app', 'Telefono'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(\backend\models\Sala::className(), ['moderador_id' => 'id'])->inverseOf('moderador');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['moderador_id' => 'id'])->inverseOf('moderador');
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
     * @return \app\models\ModeradorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ModeradorQuery(get_called_class());
    }
}
