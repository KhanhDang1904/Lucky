<?php


namespace backend\models;


use Yii;


/**
 * This is the model class for table "lucky_daily_quest".
 *
 * @property int $id
 * @property string $title
 * @property int $quantity_spin
 * @property float|null $min_total_money
 * @property float|null $min_total_spin
 * @property string|null $type
 * @property string|null $image
 * @property int $user_id
 * @property string|null $created
 * @property mixed|null $note
 * @property mixed|null $status
 */
class DailyQuest extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_daily_quest';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id'], 'required'],
            [['title', 'type', 'image'], 'string'],
            [['quantity_spin', 'user_id'], 'integer'],
            [['min_total_money', 'min_total_spin'], 'number'],
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
            'title' => 'Title',
            'quantity_spin' => 'Quantity Spin',
            'min_total_money' => 'Min Total Money',
            'min_total_spin' => 'Min Total Spin',
            'type' => 'Type',
            'image' => 'Image',
            'user_id' => 'User ID',
            'created' => 'Created',
        ];

    }
}

