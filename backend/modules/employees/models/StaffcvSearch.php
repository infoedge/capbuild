<?php

namespace backend\modules\employees\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\employees\models\Staffcv;

/**
 * StaffcvSearch represents the model behind the search form of `backend\modules\employees\models\Staffcv`.
 */
class StaffcvSearch extends Staffcv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'memberId', 'staffAttribId', 'entryBy', 'updatedBy'], 'integer'],
            [['attained', 'whereObtained', 'fromDate', 'toDate', 'testimonialCopy', 'entryDate', 'updatedDate'], 'safe'],
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
        $query = Staffcv::find();

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
            'staffAttribId' => $this->staffAttribId,
            'fromDate' => $this->fromDate,
            'toDate' => $this->toDate,
            'entryBy' => $this->entryBy,
            'entryDate' => $this->entryDate,
            'updatedBy' => $this->updatedBy,
            'updatedDate' => $this->updatedDate,
        ]);

        $query->andFilterWhere(['like', 'attained', $this->attained])
            ->andFilterWhere(['like', 'whereObtained', $this->whereObtained])
            ->andFilterWhere(['like', 'testimonialCopy', $this->testimonialCopy]);

        return $dataProvider;
    }
}
