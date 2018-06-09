<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "area_especializacion".
 *
 * @property int $id
 * @property string $area
 *
 * @property PresentadorAreaEspecializacion[] $presentadorAreaEspecializacions
 * @property Presentador[] $presentadors
 */
class AreaEspecializacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area_especializacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area' => 'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadorAreaEspecializacions()
    {
        return $this->hasMany(PresentadorAreaEspecializacion::className(), ['area_especializacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentadors()
    {
        return $this->hasMany(Presentador::className(), ['id' => 'presentador_id'])->viaTable('presentador_area_especializacion', ['area_especializacion_id' => 'id']);
    }
}
