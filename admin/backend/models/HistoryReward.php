<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "lucky_history_reward".
 *
 * @property int $id
 * @property string $type
 * @property int $user_id
 * @property int $reward_id
 * @property string $created
 * @property mixed|null $point
 * @property mixed|null $status
 * @property User $user
 *
 */
class HistoryReward extends \yii\db\ActiveRecord
{
    const WHEEL = 'Spin';
    const RECHARGE = 'Buy';
    const DAILY_QUEST = 'Daily quest';
    const GRAND_QUEST = 'Grand quest';
    const PACKAGE = 'Package';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_history_reward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'user_id'], 'required'],
            [['type'], 'string'],
            [['user_id', 'reward_id'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'reward_id' => 'Reward ID',
            'created' => 'Created',
        ];
    }

    public function getReward()
    {
        switch ($this->type){
            case HistoryReward::WHEEL:{
                $model = RotationConfig::findOne($this->reward_id);
                return [
                    'image'=>$model->image,
                    'title'=>$model->title,
                ];
            }
            case HistoryReward::RECHARGE:{
                $model = SpinPrice::findOne($this->reward_id);
                return [
                    'image'=>$model->image,
                    'title'=>$model->title,
                ];
            }
            case self::DAILY_QUEST:{
                $model = DailyQuest::findOne($this->reward_id);
                return [
                    'image'=>$model->image,
                    'title'=>$model->title,
                ];
            }
            case self::GRAND_QUEST:{
                $model = Quest::findOne($this->reward_id);
                return [
                    'image'=>$model->image,
                    'title'=>$model->title,
                ];
            }
            case self::PACKAGE:{
                $model = Package::findOne($this->reward_id);
                return [
                    'image'=>$model->image,
                    'title'=>$model->title,
                ];
            }
        }
    }

    public function getStatus()
    {
        $arr = [
          '0'=>'<a href="#" class="btn-success-gift" title="Give gift" data-id="'.$this->user_id.'" data-value="'.$this->id.'"><span class="badge badge-warning">Give gift</span></a>',
          '1'=>'<span class="badge badge-success">Received</span>',
          '2'=>'<span class="badge badge-danger">Cancel</span>',
        ];
        return isset($arr[$this->status])?$arr[$this->status]:$arr[2];
    }
    public function getUser()
    {
       return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
