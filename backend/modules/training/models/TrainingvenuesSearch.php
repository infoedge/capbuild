<?php

namespace backend\modules\training\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\training\models\Trainingvenues;

/**
 * TrainingvenuesSearch represents the model behind the search form of `backend\modules\training\models\Trainingvenues`.
 */
class TrainingvenuesSearch extends Trainingvenues
{
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['town0.townName']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'town'], 'integer'],
            [['venueName', 'description','town0.townName'], 'safe'],
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
        $query = Trainingvenues::find();

        // add conditions that should always apply here
        
        $query->joinWith('town0 mytown');

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
            'town' => $this->town,
        ]);

        $query->andFilterWhere(['like', 'venueName', $this->venueName])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like','mytown.townName',$this->getAttribute('town0.townName')]);

        return $dataProvider;
    }
}
