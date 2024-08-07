<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lucky_user_view".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $anh_nguoi_dung
 * @property string|null $password_hash
 * @property string|null $email
 * @property string|null $auth_key
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $password
 * @property string|null $hoten
 * @property string|null $dien_thoai
 * @property string|null $dia_chi
 * @property int|null $active
 * @property string|null $mobile_token
 * @property string|null $ma_kich_hoat
 * @property string|null $ngay_sinh
 * @property string|null $gioi_tinh
 * @property float|null $vi_dien_tu
 * @property string|null $ghi_chu
 * @property int|null $khoa_tai_khoan
 * @property string|null $ten_ngan_hang
 * @property string|null $so_tai_khoan
 * @property string|null $chu_tai_khoan
 * @property int|null $total_spin
 * @property int|null $point
 * @property string|null $role
 */
class UserView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lucky_user_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'status', 'active', 'khoa_tai_khoan', 'total_spin'], 'integer'],
            [['anh_nguoi_dung', 'mobile_token', 'gioi_tinh', 'ghi_chu'], 'string'],
            [['created_at', 'updated_at', 'ngay_sinh'], 'safe'],
            [['vi_dien_tu'], 'number'],
            [['username', 'password_hash', 'email', 'password', 'hoten', 'role'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['dien_thoai'], 'string', 'max' => 20],
            [['dia_chi'], 'string', 'max' => 200],
            [['ma_kich_hoat'], 'string', 'max' => 10],
            [['ten_ngan_hang', 'so_tai_khoan', 'chu_tai_khoan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'anh_nguoi_dung' => 'Anh Nguoi Dung',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'Password',
            'hoten' => 'Hoten',
            'dien_thoai' => 'Dien Thoai',
            'dia_chi' => 'Dia Chi',
            'active' => 'Active',
            'mobile_token' => 'Mobile Token',
            'ma_kich_hoat' => 'Ma Kich Hoat',
            'ngay_sinh' => 'Ngay Sinh',
            'gioi_tinh' => 'Gioi Tinh',
            'vi_dien_tu' => 'Vi Dien Tu',
            'ghi_chu' => 'Ghi Chu',
            'khoa_tai_khoan' => 'Khoa Tai Khoan',
            'ten_ngan_hang' => 'Ten Ngan Hang',
            'so_tai_khoan' => 'So Tai Khoan',
            'chu_tai_khoan' => 'Chu Tai Khoan',
            'total_spin' => 'Total Spin',
            'role' => 'Role',
            'point' => 'point',
        ];
    }
}
