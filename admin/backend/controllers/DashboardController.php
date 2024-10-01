<?php namespace backend\controllers;

use backend\models\HistoryReward;
use backend\models\RotationConfig;
use common\models\User;
use backend\models\UserView; // Import mô hình UserView
use Yii;
class DashboardController extends CoreApiController
{

//    public function actionGetUserInfo()
//    {
//        $users = User::find()
//            ->select(['vi_dien_tu'])
//            ->asArray()
//            ->all();
//
//        return $this->outputSuccess(['users' => $users]);
//    }


    public function actionIndex()
    {
        $user = User::findOne($this->uid);
        $total_spin =  User::findOne($this->uid);

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
                'anh_nguoi_dung'=>$model['anh_nguoi_dung'],
              'phone'=>is_null($model['dien_thoai'])?null:$this->makeString($model['dien_thoai']),
              'total_point'=>is_null($model['total_point'])?0:number_format($model['total_point']),
            ];
        }
        $dataWeek = [];
        foreach ($week as $model) {
            $dataWeek[]=[
                'id'=>$model['id'],
                'hoten'=>$model['hoten'],
                'phone'=>is_null($model['dien_thoai'])?null:$this->makeString($model['dien_thoai']),
                'anh_nguoi_dung'=>$model['anh_nguoi_dung'],
                'total_point'=>is_null($model['total_point'])?0:number_format($model['total_point']),
            ];
        }
        return $this->outputSuccess([ 'point' => $user->vi_dien_tu,'total_spin' => $total_spin->total_spin ,'month'=>$dataMonth,'week'=>$dataWeek]);
    }
}
