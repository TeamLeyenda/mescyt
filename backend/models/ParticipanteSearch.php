<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Participante;

/**
 * backend\models\ParticipanteSearch represents the model behind the search form about `backend\models\Participante`.
 */
 class ParticipanteSearch extends Participante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'afiliacion_id'], 'integer'],
            [['Nombre', 'Apellido', 'Telefono'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Participante::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'afiliacion_id' => $this->afiliacion_id,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono]);

        return $dataProvider;
    }
}
