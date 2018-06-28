<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%sala}}".
 *
 * @property integer $id
 * @property integer $moderador_id
 * @property string $Nombre_Sala
 *
 * @property \backend\models\Presentacion[] $presentacions
 * @property \backend\models\PresentadorSala[] $presentadorSalas
 * @property \backend\models\Presentador[] $presentadors
 */
class Sala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moderador_id', 'Nombre_Sala'], 'required'],
            [['moderador_id'], 'integer'],
            [['Nombre_Sala'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sala}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'moderador_id' => Yii::t('app', 'Moderador ID'),
            'Nombre_Sala' => Yii::t('app', 'Nombre  Sala'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['sala_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorSalas()
    {
        return $this->hasMany(\backend\models\PresentadorSala::className(), ['sala_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_sala}}', ['sala_id' => 'id']);
    }
        
    /**
     * @inheritdoc
     * @return \backend\models\SalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SalaQuery(get_called_class());
    }
}
