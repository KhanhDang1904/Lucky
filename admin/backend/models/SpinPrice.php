<?php



namespace backend\models;



use Yii;



/**
 * This is the model class for table "lucky_spin_price".
 *


 * @property int $id
 * @property string $title
 * @property int $quantity
 * @property float $price
 * @property int $user_id
 * @property string|null $created*@property mixed|null $image
 * @property mixed|null $image
 * @property int|mixed|null $active
 */
class SpinPrice extends \yii\db\ActiveRecord

{

    /**

     * {@inheritdoc}

     */

    public static function tableName()

    {

        return 'lucky_spin_price';

    }




    /**

     * {@inheritdoc}

     */

    public function rules()

    {

        return [
            [['title', 'user_id'], 'required'],
            [['title'], 'string'],
            [['quantity', 'user_id'], 'integer'],
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


            'quantity' => 'Quantity',


            'price' => 'Price',


            'user_id' => 'User ID',


            'created' => 'Created',


        ];

    }



}

