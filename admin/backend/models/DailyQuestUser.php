<?php
namespace backend\models;
use Yii;
/**
 * This is the model class for table "lucky_daily_quest_user".
 *
 * @property int $id
 * @property int $daily_quest_id
 * @property int $created
 * @property int $user_id
 */
class DailyQuestUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_daily_quest_user';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['daily_quest_id', 'user_id'], 'required'],
            [['daily_quest_id', 'user_id'], 'integer'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'daily_quest_id' => 'Daily Quest ID',


            'created' => 'Created',


            'user_id' => 'User ID',


        ];

    }



}

