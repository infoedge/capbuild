<?php

namespace backend\modules\training\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\training\models\Coursemodules;

/**
 * CoursemodulesSearch represents the model behind the search form of `backend\modules\training\models\Coursemodules`.
 */
class CoursemodulesSearch extends Coursemodules
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['moduleName', 'description'], 'safe'],
            [['duration'], 'number'],
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
        $query = Coursemodules::find();

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
            'duration' => $this->duration,
        ]);

        $query->andFilterWhere(['like', 'moduleName', $this->moduleName])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
