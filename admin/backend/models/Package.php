<?php

namespace backend\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "lucky_package".
 *
 * @property int $id
 * @property string $title
 * @property int|null $total_spin
 * @property float|null $price
 * @property string $created
 * @property int $user_id
 * @property string|null $image
 * @property int|mixed|null $active
 * @property mixed|null $note
 * @property mixed|null $status
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id'], 'required'],
            [['title', 'image'], 'string'],
            [['total_spin', 'user_id'], 'integer'],
            [['price'], 'number'],
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
            'total_spin' => 'Total Spin',
            'price' => 'Price',
            'created' => 'Created',
            'user_id' => 'User ID',
            'image' => 'Image',
        ];
    }

}
