<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lucky_quest_user".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $created
 * @property int|null $quest_id
 * @property mixed|null $total_press
 */
class QuestUser extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_quest_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'quest_id'], 'integer'],
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
            'user_id' => 'User ID',
            'created' => 'Created',
            'quest_id' => 'Quest ID',
        ];
    }
}
