<?php

namespace backend\modules\projects\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\projects\models\Theproject;

/**
 * TheprojectSearch represents the model behind the search form of `backend\modules\projects\models\Theproject`.
 */
class TheprojectSearch extends Theproject
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'memberId', 'status', 'wardNo', 'sublocation', 'createdBy'], 'integer'],
            [['title', 'description', 'road', 'plot', 'createDate','member.fullMemberName'], 'safe'],
            [['lat', 'lng'], 'number'],
        ];
    }
    
    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['member.fullMemberName']);
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
        $query = Theproject::find();

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
            'memberId' => $this->memberId,
            'status' => $this->status,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'wardNo' => $this->wardNo,
            'sublocation' => $this->sublocation,
            'createdBy' => $this->createdBy,
            'createDate' => $this->createDate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'road', $this->road])
            ->andFilterWhere(['like', 'plot', $this->plot])
            ->andFilterWhere(['like','member.fullMemberName',$this->getAttribute('member.fullMemberName')]);

        return $dataProvider;
    }
}
