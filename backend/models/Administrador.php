<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "administrador".
 *
 * @property int $id_administrador
 * @property string $User
 * @property string $Password
 */
class Administrador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'administrador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_administrador', 'User', 'Password'], 'required'],
            [['id_administrador'], 'integer'],
            [['User', 'Password'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_administrador' => 'Id Administrador',
            'User' => 'User',
            'Password' => 'Password',
        ];
    }
}
