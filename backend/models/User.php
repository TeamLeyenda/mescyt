<?php

namespace backend\models;

use Yii;
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
            [['moderador_id', 'participante_id', 'presentador_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'image'], 'required'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email', 'image'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['moderador_id', 'participante_id', 'presentador_id'], 'unique', 'targetAttribute' => ['moderador_id', 'participante_id', 'presentador_id'], 'message' => 'The combination of Moderador ID, Participante ID and Presentador ID has already been taken.'],
            [['moderador_id', 'participante_id', 'presentador_id'], 'unique', 'targetAttribute' => ['moderador_id', 'participante_id', 'presentador_id'], 'message' => 'The combination of Moderador ID, Participante ID and Presentador ID has already been taken.'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
