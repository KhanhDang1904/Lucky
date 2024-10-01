<?php namespace backend\controllers;

use backend\models\CauHinh;
use backend\models\HistoryReward;
use backend\models\RotationConfig;
use backend\models\SettingUser;
use backend\models\SpinPrice;
use common\models\myAPI;
use common\models\User;
use Pusher;
use yii\web\HttpException;

class RotationConfigController extends CoreApiController
{
    public function actionIndex()
    {
        $models = RotationConfig::find()->orderBy(['percentage'=>SORT_ASC])->andFilterWhere(['active'=>1,'status'=>1])->all();
        $data = [];
        /** @var RotationConfig $model */
        foreach ($models as $index=>$model) {
            $data []= [
                'id'=>$model->id,
                'text'=>substr($model->title, 0, 8) . "...",
                'text_full'=>$model->title,
                'fillStyle'=>$index%2==0?'#ff9fd6':'#ff36a9',
                'textStrokeStyle'=>'#DC0C83',
                'textFontWeight'=>900,
                'image'=>CauHinh::getServer().'/'.$model->image,
                'percentage'=>$model->percentage,
                'price'=>$model->price,
                'total_quantity'=>$model->total_quantity,
                'number'=>1,
                'size' => 360/count($models),
            ];
        }
        $setting = SettingUser::findOne(['user_id'=>$this->uid]);
        if (is_null($setting)){
            $setting = new SettingUser();
            $setting->user_id = $this->uid;
            $setting->value = 0;
            if(!$setting->save()){
                throw new HttpException(500, \yii\helpers\Html::errorSummary($setting));
            }
        }
        $total_spin = intval($this->user->total_spin);
        return $this->outputSuccess($data,['sound'=>$setting->value,'total_spin'=>$total_spin, 'ok'=>'1']);
    }

    public function actionChangeSpin()
    {
        $user = User::findOne($this->uid);
        $inputVal = intval($this->dataPost['pointInput']);
        $currentPoint = $user->vi_dien_tu; // Điểm hiện tại
        $currentSpin = $user->total_spin;
        $PointChange = $currentPoint - $inputVal; // Tính toán điểm
        $pointInput =($currentPoint - $PointChange)/100;
        $SpinChange = $pointInput + $currentSpin; // Tính toán số lượt quay

        $user->total_spin = $SpinChange;
        $user->vi_dien_tu = $PointChange;

//        $user->total_spin=$this->dataPost["SpinChange"];
//        $user->vi_dien_tu=$this->dataPost["PointChange"];
            if (!$user->save()){
                throw new HttpException(500, \yii\helpers\Html::errorSummary($user));
            }
         return $user->attributes;
    }
    public function actionUpdateSpin()
    {
        // update total spin
        $user = User::findOne($this->uid);
        if (!is_null($user)){
            $user->total_spin -=1;
            if (!$user->save()){
                throw new HttpException(500, \yii\helpers\Html::errorSummary($user));
            }
        }


        $reward = RotationConfig::findOne($this->dataPost['id']);
        //Save history reward
        $history_reward  = new  HistoryReward();
        $history_reward->type = HistoryReward::WHEEL;
        $history_reward->user_id = $this->uid;
        $history_reward->reward_id = $this->dataPost['id'];
        $history_reward->point = $reward->point;
        if(!$history_reward->save()){
            throw new HttpException(500, \yii\helpers\Html::errorSummary($history_reward));
        }
        //update total_quantity reward
        $reward->total_quantity -= 1;
        if (!$reward->save()){
            throw new HttpException(500, \yii\helpers\Html::errorSummary($reward));
        }
        // pusher notification
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'ff239249c6d1bc1bcaab',
            'af5172b7a87ed3c9c39a',
            '1821177',
            $options
        );
        $string = "Congratulations ".$this->makeString(myAPI::createEngName($user->hoten))." received ".$reward->title;
        $data['messages'] = $string;
        $pusher->trigger('my-channel', 'my-event', $data);
        return $this->outputSuccess();
    }
    public function actionGetListSpin()
    {
         $models = SpinPrice::find()->select(['id','quantity','price'])->andFilterWhere(['active'=>1])->all();
         return $this->outputSuccess($models);
    }
    public function actionSaveBuySpin()
    {
        if (!isset($this->dataPost['id'])){
            throw new HttpException(500, 'Please choose package');
        }
        $spin = SpinPrice::findOne($this->dataPost['id']);
        if (is_null($spin)){
            throw new HttpException(500, 'Please choose package');
        }
        $user = User::findOne($this->uid);
        if (is_null($user)){
            throw new HttpException(500, 'User not found');
        }
        if ($user->vi_dien_tu<$spin->price){
            throw new HttpException(500, 'You don\'t have enough spin');
        }
        $user->vi_dien_tu -= $spin->price;
        $user->total_spin += $spin->quantity;
        if (!$user->save()){
            throw new HttpException(500, \yii\helpers\Html::errorSummary($user));
        }
        $history = new HistoryReward();
        $history->type = HistoryReward::RECHARGE;
        $history->user_id = $this->uid;
        $history->reward_id = $spin->id;
        if (!$history->save()){
            throw new HttpException(500, \yii\helpers\Html::errorSummary($history));
        };
        return $this->outputSuccess();
    }

}
