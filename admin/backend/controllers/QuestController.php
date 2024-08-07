<?php namespace backend\controllers;

use backend\models\Quest;
use backend\models\QuestUser;
use yii\bootstrap\Html;
use yii\web\HttpException;

class QuestController extends CoreApiController
{
    public function actionIndex()
    {
        $models = Quest::find()->select(['id', 'title', 'total_spin', 'image','total_success'])->andFilterWhere(['active'=>1,'status'=>1])->all();
        $data = [];
        /** @var Quest $model */
        foreach ($models as $model) {
            $user_quest = QuestUser::findOne(['user_id'=> $this->uid,'quest_id'=>$model->id]);
            if(is_null($user_quest)){
                $user_quest = new QuestUser();
                $user_quest->user_id = $this->uid;
                $user_quest->quest_id = $model->id;
                if(!$user_quest->save()){
                    throw new HttpException(500,Html::errorSummary($user_quest));
                }
            }
            $data[] = [
                'id' => $model->id,
                'title' => $model->title,
                'quantity_spin' => $model->total_spin,
                'image' => $model->image,
                'total_press' => $user_quest->total_press,
                'total_success' => $model->total_success,
                'active' => $user_quest->total_press >= $model->total_success,
            ];
        }
        return $this->outputSuccess($data);
    }
}
