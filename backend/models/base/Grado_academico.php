<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%grado_academico}}".
 *
 * @property integer $id
 * @property string $Grado
 *
 * @property \backend\models\PresentadorGradoAcademico[] $presentadorGradoAcademicos
 * @property \backend\models\Presentador[] $presentadors
 */
class Grado_academico extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentadorGradoAcademicos',
            'presentadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Grado'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%grado_academico}}';
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
            'Grado' => Yii::t('app', 'Grado'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorGradoAcademicos()
    {
        return $this->hasMany(\backend\models\PresentadorGradoAcademico::className(), ['grado_academico_id' => 'id'])->inverseOf('gradoAcademico');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_grado_academico}}', ['grado_academico_id' => 'id']);
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
     * @return \app\models\Grado_academicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Grado_academicoQuery(get_called_class());
    }
}
