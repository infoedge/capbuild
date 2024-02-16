<?php

namespace backend\modules\authorization\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\authorization\models\Approvalcontrol;

/**
 * ApprovalcontrolSearch represents the model behind the search form of `backend\modules\authorization\models\Approvalcontrol`.
 */
class ApprovalcontrolSearch extends Approvalcontrol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'approvalType', 'serialOrder'], 'integer'],
            [['tabName', 'beginDate', 'closeDate'], 'safe'],
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
        $query = Approvalcontrol::find();

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
            'approvalType' => $this->approvalType,
            'serialOrder' => $this->serialOrder,
            'beginDate' => $this->beginDate,
            'closeDate' => $this->closeDate,
        ]);

        $query->andFilterWhere(['like', 'tabName', $this->tabName]);

        return $dataProvider;
    }
}
