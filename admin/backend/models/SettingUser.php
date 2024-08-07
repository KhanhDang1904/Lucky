<?php


namespace backend\models;

use Yii;

/**
 * This is the model class for table "lucky_setting_user".
 *

 * @property int $id


 * @property int|null $user_id


 * @property int|null $value



 */
class SettingUser extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_setting_user';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'value'], 'integer'],
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


            'value' => 'Value',


        ];
    }


}
