<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lucky_price".
 *
 * @property string|null $title
 * @property string|null $image
 * @property int $id
 * @property string|null $created
 * @property int|null $user_id
 * @property int|null $status
 * @property string|null $note
 * @property int|mixed|null $active
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_price';
    }

    public $attribute;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image', 'note'], 'string'],
            [['created'], 'safe'],
            [['user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'image' => 'Image',
            'id' => 'ID',
            'created' => 'Created',
            'user_id' => 'User ID',
            'note' => 'Note',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {

    }


}
