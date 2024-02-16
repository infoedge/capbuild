<?php

namespace backend\modules\settings\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\Wards;

/**
 * WardsSearch represents the model behind the search form of `backend\modules\settings\models\Wards`.
 */
class WardsSearch extends Wards
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'countyNo', 'constituencyNo'], 'integer'],
            [['wardName'], 'safe'],
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
        $query = Wards::find();

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
            'countyNo' => $this->countyNo,
            'constituencyNo' => $this->constituencyNo,
        ]);

        $query->andFilterWhere(['like', 'wardName', $this->wardName]);

        return $dataProvider;
    }
}
