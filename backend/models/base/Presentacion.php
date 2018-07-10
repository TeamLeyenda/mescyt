<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%presentacion}}".
 *
 * @property integer $id
 * @property integer $congreso_id
 * @property integer $sala_id
 * @property string $Titulo
 * @property string $Institucion
 * @property string $Area_Tematica
 * @property string $Modalidad_Presentacion
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 * @property string $Vinculo
 * @property resource $Archivo
 *
 * @property \backend\models\Sala $sala
 * @property \backend\models\Congreso $congreso
 * @property \backend\models\PresentacionUser[] $presentacionUsers
 * @property \backend\models\User[] $users
 */
class Presentacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'sala',
            'congreso',
            'presentacionUsers',
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id', 'sala_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Archivo'], 'file'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['Vinculo'], 'string', 'max' => 255]
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
            'congreso_id' => Yii::t('app', 'Congreso'),
            'sala_id' => Yii::t('app', 'Sala'),
            'Titulo' => Yii::t('app', 'Titulo'),
            'Institucion' => Yii::t('app', 'Institucion'),
            'Area_Tematica' => Yii::t('app', 'Area Tematica'),
            'Modalidad_Presentacion' => Yii::t('app', 'Modalidad Presentacion'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha Inicio'),
            'Fecha_Final' => Yii::t('app', 'Fecha Final'),
            'Vinculo' => Yii::t('app', 'Vinculo'),
            'Archivo' => Yii::t('app', 'Archivo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(\backend\models\Sala::className(), ['id' => 'sala_id']);
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
    public function getPresentacionUsers()
    {
        return $this->hasMany(\backend\models\PresentacionUser::className(), ['presentacion_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['id' => 'user_id'])->viaTable('{{%presentacion_user}}', ['presentacion_id' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\PresentacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PresentacionQuery(get_called_class());
    }
}
