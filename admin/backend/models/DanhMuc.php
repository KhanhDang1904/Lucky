<?php

namespace backend\models;

use common\models\myActiveRecord;
use common\models\User;
use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "{{%danh_muc}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $code
 * @property string $ghi_chu
 * @property int|null $parent_id
 * @property int|null $active
 *
 * @property DanhMuc $parent
 * @property DanhMuc[] $danhMucs
 * @property User[] $users
 */
//enum('Phòng ban', 'Loại công việc', 'Nhóm nhân viên', 'Kết quả thực hiện', 'Yêu cầu kết quả', 'Tần suất thực hiện', 'Chức vụ', 'Điểm số','Quy trình công việc liên quan')
class DanhMuc extends myActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lucky_danh_muc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'type'], 'trim'],
            [['type'], 'string'],
            [['parent_id', 'active'], 'integer'],
            [['name', 'code'], 'string', 'max' => 200],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => DanhMuc::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'type' => 'Phân loại',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDanhMucs()
    {
        return $this->hasMany(DanhMuc::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['branch_id' => 'id']);
    }

}
