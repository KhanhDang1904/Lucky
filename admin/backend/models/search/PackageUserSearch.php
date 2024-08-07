<?php

namespace backend\models\search;

use backend\models\CauHinh;
use backend\models\HistoryReward;
use backend\models\Package;
use backend\models\PackageUser;
use backend\models\Price;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CauhinhSearch represents the model behind the search form about `backend\models\Cauhinh`.
 */
class PackageUserSearch extends PackageUser
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
    public function search($params,$id)
    {
        $query = PackageUser::find()->orderBy(['id' => SORT_DESC])->andFilterWhere(['user_id' => $id]);
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
        return $dataProvider;
    }
}
