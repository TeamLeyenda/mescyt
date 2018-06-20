<?php

namespace backend\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%presentador_grado_academico}}".
 *
 * @property integer $presentador_id
 * @property integer $grado_academico_id
 *
 * @property \backend\models\GradoAcademico $gradoAcademico
 * @property \backend\models\Presentador $presentador
 */
class Presentador_grado_academico extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'gradoAcademico',
            'presentador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentador_id', 'grado_academico_id'], 'required'],
            [['presentador_id', 'grado_academico_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentador_grado_academico}}';
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
            'presentador_id' => Yii::t('app', 'Presentador ID'),
            'grado_academico_id' => Yii::t('app', 'Grado Academico ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademico()
    {
        return $this->hasOne(\backend\models\GradoAcademico::className(), ['id' => 'grado_academico_id'])->inverseOf('presentadorGradoAcademicos');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->inverseOf('presentadorGradoAcademicos');
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
     * @return \app\models\Presentador_grado_academicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Presentador_grado_academicoQuery(get_called_class());
    }
}
