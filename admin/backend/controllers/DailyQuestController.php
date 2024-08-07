<?php namespace backend\controllers;

use backend\models\DailyQuest;
use backend\models\DailyQuestUser;
use backend\models\HistoryReward;
use common\models\User;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

class DailyQuestController extends CoreApiController
{
    public function actionIndex()
    {
        $models = DailyQuest::find()->select(['id', 'title', 'quantity_spin', 'image'])->andFilterWhere(['active'=>1,'status'=>1])->all();
        $user_daily = ArrayHelper::map(DailyQuestUser::find()->andFilterWhere(['user_id'=> $this->uid])->andFilterWhere(['date(created)'=> date('Y-m-d')])->all(), 'daily_quest_id', 'daily_quest_id');
        $data = [];
        /** @var DailyQuest $model */
        foreach ($models as $model) {
            $data[] = [
                'id' => $model->id,
                'title' => $model->title,
                'quantity_spin' => $model->quantity_spin,
                'image' => $model->image,
                'active' => isset($user_daily[$model->id]),
            ];
        }
        return $this->outputSuccess($data);
    }
    public function actionUpdate()
    {
        $model = DailyQuest::findOne(['id' => $this->dataPost['id']]);
        if (is_null($model)) {
            throw new HttpException(500,'Daily Quest not found');
        }
        $user_daily = new DailyQuestUser();
        $user_daily->user_id = $this->uid;
        $user_daily->daily_quest_id = $model->id;
        if (!$user_daily->save()) {
            throw new HttpException(500,Html::errorSummary($user_daily));
        }
        $user = User::findOne($this->uid);
        $user->total_spin +=$model->quantity_spin;
        if (!$user->save()) {
            throw new HttpException(500,Html::errorSummary($user));
        }
        $history = new HistoryReward();
        $history->type = HistoryReward::DAILY_QUEST;
        $history->user_id = $this->uid;
        $history->reward_id = $model->id;
        if (!$history->save()){
            throw new HttpException(500, \yii\helpers\Html::errorSummary($history));
        };
        return $this->outputSuccess();
    }
}
