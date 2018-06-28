<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%moderador}}".
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Telefono
 *
 * @property \backend\models\Sala[] $salas
 * @property \backend\models\User $user
 */
class Moderador extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['Telefono'], 'string', 'max' => 20]
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
        return $this->hasMany(\backend\models\Sala::className(), ['moderador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['moderador_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\ModeradorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ModeradorQuery(get_called_class());
    }
}
