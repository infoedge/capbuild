<?php

namespace backend\modules\training\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\training\models\Trainingunit;

/**
 * TrainingunitSearch represents the model behind the search form of `backend\modules\training\models\Trainingunit`.
 */
class TrainingunitSearch extends Trainingunit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trainingModuleId', 'courseModuleId', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createdDate'], 'safe'],
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
        $query = Trainingunit::find();

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
            'trainingModuleId' => $this->trainingModuleId,
            'courseModuleId' => $this->courseModuleId,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'createdBy' => $this->createdBy,
            'createdDate' => $this->createdDate,
        ]);

        return $dataProvider;
    }
}
