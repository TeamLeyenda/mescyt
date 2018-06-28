<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "presentador_presentacion".
 *
 * @property integer $presentador_id
 * @property integer $presentacion_id
 *
 * @property \backend\models\Presentacion $presentacion
 * @property \backend\models\Presentador $presentador
 */
class Presentador_presentacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentador_id', 'presentacion_id'], 'required'],
            [['presentador_id', 'presentacion_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentador_presentacion';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'presentador_id' => Yii::t('app', 'Presentador ID'),
            'presentacion_id' => Yii::t('app', 'Presentacion ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacion()
    {
        return $this->hasOne(\backend\models\Presentacion::className(), ['id' => 'presentacion_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(\backend\models\Presentador::className(), ['id' => 'presentador_id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\Presentador_presentacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\Presentador_presentacionQuery(get_called_class());
    }
}
