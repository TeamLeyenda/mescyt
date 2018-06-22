<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%user}}".
 *
 * @property integer $id
 * @property integer $moderador_id
 * @property integer $participante_id
 * @property integer $presentador_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $image
 *
 * @property \backend\models\Moderador $moderador
 * @property \backend\models\Participante $participante
 * @property \backend\models\Presentador $presentador
 */
class User extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'moderador',
            'participante',
            'presentador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moderador_id', 'participante_id', 'presentador_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'image'], 'required'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email', 'image'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['moderador_id', 'participante_id', 'presentador_id'], 'unique', 'targetAttribute' => ['moderador_id', 'participante_id', 'presentador_id'], 'message' => 'The combination of Moderador ID, Participante ID and Presentador ID has already been taken.'],
            [['moderador_id', 'participante_id', 'presentador_id'], 'unique', 'targetAttribute' => ['moderador_id', 'participante_id', 'presentador_id'], 'message' => 'The combination of Moderador ID, Participante ID and Presentador ID has already been taken.'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
            'moderador_id' => Yii::t('app', 'Moderador ID'),
            'participante_id' => Yii::t('app', 'Participante ID'),
            'presentador_id' => Yii::t('app', 'Presentador ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModerador()
    {
        return $this->hasOne(\backend\models\Moderador::className(), ['id' => 'moderador_id'])->inverseOf('users');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipante()
    {
        return $this->hasOne(\backend\models\Participante::className(), ['id' => 'participante_id'])->inverseOf('users');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->inverseOf('users');
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\UserQuery(get_called_class());
    }
}
