<?php

namespace backend\models\search;

use backend\models\DailyQuest;
use backend\models\SpinPrice;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CauhinhSearch represents the model behind the search form about `backend\models\Cauhinh`.
 */
class DailyQuestSearch extends DailyQuest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        $query = DailyQuest::find()->orderBy(['id' => SORT_DESC])->andFilterWhere(['active' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}