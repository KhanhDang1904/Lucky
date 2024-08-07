<?php namespace backend\controllers;

use backend\models\HistoryReward;
use backend\models\RotationConfig;
use common\models\User;

class DashboardController extends CoreApiController
{
    public function actionIndex()
    {
        $month = User::find()
            ->leftJoin(HistoryReward::tableName(),
                User::tableName().'.id = '.HistoryReward::tableName().'.user_id and '
                . HistoryReward::tableName().'.type = "'. HistoryReward::WHEEL.'" and '
                .'year('.HistoryReward::tableName().'.created) = '. date('Y').' and '
                .'month('.HistoryReward::tableName().'.created) = '. date('m')
            )
            ->leftJoin(RotationConfig::tableName(), RotationConfig::tableName().'.id = '.HistoryReward::tableName().'.reward_id')
            ->select('sum('.RotationConfig::tableName().'.point) as total_point,'.User::tableName().'.*,'.HistoryReward::tableName().'.created')
            ->groupBy([User::tableName().'.id'])
            ->orderBy(['total_point' => SORT_DESC])
            ->createCommand()->queryAll();
        $week = User::find()
            ->leftJoin(HistoryReward::tableName(),
                User::tableName().'.id = '.HistoryReward::tableName().'.user_id and '
                . HistoryReward::tableName().'.type = "'. HistoryReward::WHEEL.'" and '
                .'year('.HistoryReward::tableName().'.created) = '. date('Y').' and '
                .'month('.HistoryReward::tableName().'.created) = '. date('m').' and '
                .'WEEK('.HistoryReward::tableName().'.created) = '. date('W')
            )
            ->leftJoin(RotationConfig::tableName(), RotationConfig::tableName().'.id = '.HistoryReward::tableName().'.reward_id')
            ->select('sum('.RotationConfig::tableName().'.point) as total_point,'.User::tableName().'.*,'.HistoryReward::tableName().'.created')
            ->groupBy([User::tableName().'.id'])
            ->orderBy(['total_point' => SORT_DESC])
            ->createCommand()->queryAll();
        $dataMonth = [];
        foreach ($month as $model) {
            $dataMonth[]=[
              'id'=>$model['id'],
              'hoten'=>$model['hoten'],
              'phone'=>is_null($model['dien_thoai'])?null:$this->makeString($model['dien_thoai']),
            ];
        }
        $dataWeek = [];
        foreach ($week as $model) {
            $dataWeek[]=[
                'id'=>$model['id'],
                'hoten'=>$model['hoten'],
                'phone'=>is_null($model['dien_thoai'])?null:$this->makeString($model['dien_thoai']),
            ];
        }
        return $this->outputSuccess(['month'=>$dataMonth,'week'=>$dataWeek]);
    }
}
