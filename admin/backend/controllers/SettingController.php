<?php namespace backend\controllers;

use backend\models\CauHinh;
use backend\models\SettingUser;
use yii\helpers\Html;
use yii\web\HttpException;

class SettingController extends CoreApiController
{
   public function actionIndex(){
       $setting = SettingUser::findOne(['user_id'=>$this->uid]);
       if (is_null($setting)){
           $setting = new SettingUser();
           $setting->user_id = $this->uid;
           $setting->value = 0;
           if(!$setting->save()){
               throw new HttpException(500,Html::errorSummary($setting));
           }
       }
       return $this->outputSuccess($setting->value);
   }
   public function actionUpdate()
   {
       $setting = SettingUser::findOne(['user_id'=>$this->uid]);
       if (!is_null($setting)){
           $setting->value = $this->dataPost['value']=='true'?1:0;
           $setting->save();
       }
   }
   public function actionGuidelines()
   {
        return $this->outputSuccess(CauHinh::findOne(43)->ghi_chu);
   }
   public function actionGetBackground()
   {
       $model = CauHinh::findOne(CauHinh::BACKGROUND);
       return $this->outputSuccess($model->image);
   }
}
