<?php



namespace backend\models;



use Yii;



/**

 * This is the model class for table "lucky_history".

 *


 * @property int $id


 * @property int $action_id


 * @property int $feature_id


 * @property string|null $description


 * @property string|null $detail


 * @property int|null $transaction_id


 * @property int|null $store_id


 * @property int $user_init


 * @property int $user_upd


 * @property string $history_ip


 * @property string|null $device_name


 * @property string|null $created_at


 * @property string|null $updated_at


 * @property string $role



 */

class History extends \yii\db\ActiveRecord

{
    const LOGIN = 'login';

    /**

     * {@inheritdoc}

     */

    public static function tableName()

    {

        return 'lucky_history';

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


            'action_id' => 'Action ID',


            'feature_id' => 'Feature ID',


            'description' => 'Description',


            'detail' => 'Detail',


            'transaction_id' => 'Transaction ID',


            'store_id' => 'Store ID',


            'user_init' => 'User Init',


            'user_upd' => 'User Upd',


            'history_ip' => 'History Ip',


            'device_name' => 'Device Name',


            'created_at' => 'Created At',


            'updated_at' => 'Updated At',


            'role' => 'Role',


        ];

    }



}

