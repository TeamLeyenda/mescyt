<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "user".
 *
 * @property integer $id
 * @property integer $afiliacion_id
 * @property integer $tipo_user_id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $image
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 *
 * @property Auth[] $auths
 * 
 * @property \backend\models\PresentacionUser[] $presentacionUsers
 * @property \backend\models\Presentacion[] $presentacions
 * @property \backend\models\Afiliacion $afiliacion
 * @property \backend\models\TipoUser $tipoUser
 * @property \backend\models\UserAreaEspecializacion[] $userAreaEspecializacions
 * @property \backend\models\AreaEspecializacion[] $areaEspecializacions
 * @property \backend\models\UserGradoAcademico[] $userGradoAcademicos
 * @property \backend\models\GradoAcademico[] $gradoAcademicos
 * @property \backend\models\UserSala[] $userSalas
 * @property \backend\models\Sala[] $salas
 */
class User extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['afiliacion_id', 'tipo_user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email', 'image'], 'string', 'max' => 255],
            [['Nombre'], 'string', 'max' => 50],
            [['Apellido', 'Telefono'], 'string', 'max' => 20],
            [['email'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'afiliacion_id' => Yii::t('app', 'Afiliacion ID'),
            'tipo_user_id' => Yii::t('app', 'Tipo User ID'),
            'username' => Yii::t('app', 'Usuario'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'contrasena'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'estado'),
            'image' => Yii::t('app', 'perfil'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Telefono' => Yii::t('app', 'Telefono'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacionUsers()
    {
        return $this->hasMany(\backend\models\PresentacionUser::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['id' => 'presentacion_id'])->viaTable('presentacion_user', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(\backend\models\Afiliacion::className(), ['id' => 'afiliacion_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUser()
    {
        return $this->hasOne(\backend\models\TipoUser::className(), ['id' => 'tipo_user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\UserAreaEspecializacion::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\AreaEspecializacion::className(), ['id' => 'area_especializacion_id'])->viaTable('user_area_especializacion', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGradoAcademicos()
    {
        return $this->hasMany(\backend\models\UserGradoAcademico::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademicos()
    {
        return $this->hasMany(\backend\models\GradoAcademico::className(), ['id' => 'grado_academico_id'])->viaTable('user_grado_academico', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSalas()
    {
        return $this->hasMany(\backend\models\UserSala::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(\backend\models\Sala::className(), ['id' => 'sala_id'])->viaTable('user_sala', ['user_id' => 'id']);
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
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserQuery(get_called_class());
    }
}
