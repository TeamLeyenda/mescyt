<?php

namespace backend\models;

use \backend\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['afiliacion_id', 'tipo_user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'password_hash', 'auth_key'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
            [['Apellido', 'Telefono'], 'string', 'max' => 20],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['email', 'image', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['email'], 'unique']
        ]);
    }
	
}
