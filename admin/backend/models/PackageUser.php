<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "lucky_package_user".
 *
 * @property int $id
 * @property int $package_id
 * @property int $user_id
 * @property string|null $created
 * @property Package $package
 * @property User $user
 *
 */
class PackageUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_package_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'user_id'], 'required'],
            [['package_id', 'user_id'], 'integer'],
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
            'package_id' => 'Package ID',
            'user_id' => 'User ID',
            'created' => 'Created',
        ];
    }
    public function getPackage(){
        return $this->hasOne(Package::className(), ['id' => 'package_id']);
    }
    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
