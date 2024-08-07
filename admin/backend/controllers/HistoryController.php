<?php namespace backend\controllers;

use backend\models\Banner;
use backend\models\HistoryReward;
use backend\models\PhuPhi;
use backend\models\TinTuc;

class HistoryController extends CoreApiController
{
   public function actionIndex(){
       $models = HistoryReward::find()
           ->andFilterWhere(['user_id'=>$this->uid])
           ->orderBy(['id'=>SORT_DESC])->all();
       $data = [];
       /** @var HistoryReward $model */
       foreach ($models as $model){
            $data[] = [
                'id'=>$model->id,
                'model'=>$model->getReward(),
                'created'=>date('H:i d/m/Y', strtotime($model->created)),
                'type'=>$model->type,
            ];
       }
       return $this->outputSuccess(['models'=>$data,'total_spin'=>number_format($this->user->total_spin,0,',','.')]);
   }
}
