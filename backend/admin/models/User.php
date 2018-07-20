<?php

namespace backend\admin\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\admin\components\Configs;

/**
 * User model
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellido
 * @property integer $afiliacion_id
 * @property integer $tipo_user_id
 * @property string $username
 * @property string $email
 * @property string $Telefono
 * @property string $image
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\models\UserAreaEspecializacion[] $userAreaEspecializacions
 * @property \backend\models\AreaEspecializacion[] $areaEspecializacions
 * @property \backend\models\UserGradoAcademico[] $userGradoAcademicos
 * @property \backend\models\GradoAcademico[] $gradoAcademicos
 * @property \backend\models\UserSala[] $userSalas
 * @property \backend\models\Sala[] $sala
 * 
 * @property UserProfile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->userTable;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                'password_reset_token' => $token,
                'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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

    public static function getDb()
    {
        return Configs::userDb();
    }
}
