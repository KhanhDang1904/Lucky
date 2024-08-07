<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lucky_quest".
 *
 * @property int $id
 * @property string $title
 * @property string|null $created
 * @property int $user_id
 * @property int|null $total_spin
 * @property int|null $total_success
 * @property int|null $total_press
 * @property string|null $image
 */
class Quest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const LOGIN = 'Login';
    const DEFAULT = 'Default';
    public static function tableName()
    {
        return 'lucky_quest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

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
            'created' => 'Created',
            'user_id' => 'User ID',
            'total_spin' => 'Total Spin',
            'total_success' => 'Total Success',
            'total_press' => 'Total Press',
            'image' => 'Image',
        ];
    }
}
