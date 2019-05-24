<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carmodel;

/**
 * CarmodelSearch represents the model behind the search form of `app\models\Carmodel`.
 */
class CarmodelSearch extends Carmodel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'price', 'seats', 'doors', 'air_conditioning', 'count'], 'integer'],
            [['name', 'picture', 'engine_volume', 'engine_type', 'body', 'transmission'], 'safe'],
            [['fuel_consumption'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Carmodel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'price' => $this->price,
            'fuel_consumption' => $this->fuel_consumption,
            'seats' => $this->seats,
            'doors' => $this->doors,
            'air_conditioning' => $this->air_conditioning,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'engine_volume', $this->engine_volume])
            ->andFilterWhere(['like', 'engine_type', $this->engine_type])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'transmission', $this->transmission]);

        return $dataProvider;
    }
}
