<?php

namespace backend\models;

use \backend\models\base\PresentacionUser as BasePresentacionUser;

/**
 * This is the model class for table "presentacion_user".
 */
class PresentacionUser extends BasePresentacionUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['presentacion_id', 'user_id'], 'required'],
            [['presentacion_id', 'user_id'], 'integer']
        ]);
    }
	
}
