<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%sala}}".
 *
 * @property integer $id
 * @property integer $moderador_id
 * @property string $Nombre_Sala
 *
 * @property \backend\models\PresentadorSala[] $presentadorSalas
 * @property \backend\models\Presentador[] $presentadors
 * @property \backend\models\Moderador $moderador
 */
class Sala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentadorSalas',
            'presentadors',
            'moderador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moderador_id', 'Nombre_Sala'], 'required'],
            [['moderador_id'], 'integer'],
            [['Nombre_Sala'], 'string', 'max' => 20],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
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
            'Nombre_Sala' => Yii::t('app', 'Nombre Sala'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorSalas()
    {
        return $this->hasMany(\backend\models\PresentadorSala::className(), ['sala_id' => 'id'])->inverseOf('sala');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_sala}}', ['sala_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModerador()
    {
        return $this->hasOne(\backend\models\Moderador::className(), ['id' => 'moderador_id'])->inverseOf('salas');
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
     * @return \app\models\SalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SalaQuery(get_called_class());
    }
}
