<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%presentacion}}".
 *
 * @property integer $id
 * @property integer $congreso_id
 * @property string $Titulo
 * @property string $Institucion
 * @property string $Area_Tematica
 * @property string $Modalidad_Presentacion
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 *
 * @property \backend\models\Congreso $congreso
 * @property \backend\models\PresentadorPresentacion[] $presentadorPresentacions
 * @property \backend\models\Presentador[] $presentadors
 */
class Presentacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentacion}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'congreso_id' => Yii::t('app', 'Congreso ID'),
            'Titulo' => Yii::t('app', 'Titulo'),
            'Institucion' => Yii::t('app', 'Institucion'),
            'Area_Tematica' => Yii::t('app', 'Area  Tematica'),
            'Modalidad_Presentacion' => Yii::t('app', 'Modalidad  Presentacion'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha  Inicio'),
            'Fecha_Final' => Yii::t('app', 'Fecha  Final'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongreso()
    {
        return $this->hasOne(\backend\models\Congreso::className(), ['id' => 'congreso_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorPresentacions()
    {
        return $this->hasMany(\backend\models\PresentadorPresentacion::className(), ['presentacion_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(\backend\models\Presentador::className(), ['id' => 'presentador_id'])->viaTable('{{%presentador_presentacion}}', ['presentacion_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\PresentacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PresentacionQuery(get_called_class());
    }
}
