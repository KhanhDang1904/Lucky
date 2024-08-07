<?php



namespace backend\models;



use Yii;



/**
 * This is the model class for table "lucky_rotation_config".
 *


 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property float|null $percentage
 * @property float|null $price
 * @property int|null $total_quantity
 * @property string $created
 * @property string $updated
 * @property int $user_id
 * @property int $point*@property mixed|null $status
 */
class RotationConfig extends \yii\db\ActiveRecord

{

    /**

     * {@inheritdoc}

     */

    public static function tableName()

    {

        return 'lucky_rotation_config';

    }




    /**

     * {@inheritdoc}

     */

    public function rules()

    {

        return [
            [['title', 'user_id'], 'required'],
            [['image'], 'string'],
            [['percentage', 'price'], 'number'],
            [['total_quantity', 'user_id', 'point'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 255],
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


            'image' => 'Image',


            'percentage' => 'Percentage',


            'price' => 'Price',


            'total_quantity' => 'Total Quantity',


            'created' => 'Created',


            'updated' => 'Updated',


            'user_id' => 'User ID',


            'point' => 'Point',


        ];

    }



}

