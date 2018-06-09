<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "catalogo".
 *
 * @property int $id
 * @property int $presentador_id
 * @property string $name
 *
 * @property Presentador $presentador
 */
class Catalogo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalogo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['presentador_id'], 'required'],
            [['presentador_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['presentador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Presentador::className(), 'targetAttribute' => ['presentador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'presentador_id' => 'Presentador ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentador()
    {
        return $this->hasOne(Presentador::className(), ['id' => 'presentador_id']);
    }
}
