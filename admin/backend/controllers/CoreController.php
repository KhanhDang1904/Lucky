<?php

namespace backend\controllers;

use backend\models\CauHinh;
use common\models\User;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;

class CoreController extends Controller
{
    public $dataPost;
    public $dataGet;
    public $uid;
    public $auth;
    public $tuKhoa;
    public $sort;
    public $page;
    public $limit;
    public $tuNgay;
    public $denNgay;

    public function beforeAction($action)
    {
        $this->dataPost = $_POST;
        $this->dataGet = $_GET;
        $this->tuKhoa = isset($_GET['tuKhoa']) ? $_GET['tuKhoa'] : "";
        $this->tuNgay = isset($_GET['tuNgay']) ? ($_GET['tuNgay'] !== "" ? ($_GET['tuNgay']) : date("Y-n-j", strtotime("first day of this month"))) : date("Y-n-j", strtotime("first day of this month"));
        $this->denNgay = isset($_GET['denNgay']) ? ($_GET['denNgay'] !== "" ? ($_GET['denNgay']) : date("Y-n-j", strtotime("last day of this month"))) : date("Y-n-j", strtotime("last day of this month"));
        $this->page = isset($_GET['page']) ? (intval($_GET['page']) > 0 ? intval($_GET['page']) : 1) : 1;
        $this->limit = isset($_GET['limit']) ? (intval($_GET['limit']) > 0 ? intval($_GET['limit']) : 10) : 10;
        $this->sort = isset($_GET['sort']) ? ($_GET['sort'] != "" ? intval($_GET['sort']) : 1) : 1;
        if (!in_array($action->id, [
            'login',
            'logout',
            'error',
            'get-form-giao-vien',
            'get-form-phu-huynh',
            'save-khao-sat'
        ])) {
            if (!\Yii::$app->user->isGuest) {
                $user = User::findOne(\Yii::$app->user->id);
                if ($user->status == 0)
                    $this->redirect(\yii\helpers\Url::toRoute('site/logout'));
            }
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function outputListSuccess($data = "", $mes = "")
    {
        if (!isset($this->dataGet['page'])) {
            throw new HttpException(400, "Vui lòng truyền tham số page");
        }
        if (intval($this->dataGet['page']) == 0) {
            throw new HttpException(500, "page tối thiểu bằng 1");
        }
        $total = count($data->all());
        $data = $data->limit($this->limit)->offset(($this->page - 1) * $this->limit)->orderBy(['created' => $this->sort == 1 ? SORT_DESC : SORT_ASC])->all();
        foreach ($data as $item) {
            if (isset($item->image)) {
                $item->image = CauHinh::getImage(($item->image));
            }
        }
        $lastPage = ceil($total / $this->limit);
        return [
            'status' => true,
            'code' => 200,
            'message' => $mes,
            'total' => $total,
            'per_page' => $this->limit,
            'current_page' => $this->page,
            'last_page' => $lastPage,
            'next_page_url' => $this->page < $lastPage ? CauHinh::getServer() . $_SERVER['REDIRECT_URL'] . "?" . str_replace('page=' . $this->page, 'page=' . ($this->page + 1), $_SERVER['QUERY_STRING']) : null,
            'prev_page_url' => $this->page > 1 ? CauHinh::getServer() . $_SERVER['REDIRECT_URL'] . "?" . str_replace('page=' . $this->page, 'page=' . ($this->page - 1), $_SERVER['QUERY_STRING']) : null,
            'form' => ($this->page - 1) * $this->limit + 1,
            'to' => $this->page * $this->limit,
            'data' => $data,
        ];
    }
    public function checkField($fields)
    {
        foreach ($fields as $field) {
            if (!isset($this->dataPost[$field])) {
                throw new HttpException(400, "Vui lòng truyền tham số " . $field);
            }
        }
    }
    public function saveImage($model,$path_old = '')
    {
        $file = UploadedFile::getInstance($model,'image');
        if (!empty($file)) {
            $path = '/assets/lucky/img';
            $link = date('Y/m/d') . '/' . '_' . \Yii::$app->security->generateRandomString() . $this->get_extension_image($file->type);
            if (FileHelper::createDirectory('..'.$path . '/' . date('Y/m/d') . '/', $mode = 0775, $recursive = true)) {
                $file->saveAs('..'.$path . '/' . $link);
                if (file_exists('..'.$path . '/' . $link)){
                    if (file_exists($path_old)){
                        unlink($path_old);
                    }
                    return $path . '/' . $link;
                }
            }
        }


        return null;
    }
    public function outputSuccess($data = "", $mes = "")
    {
        return [
            'status' => true,
            'code' => 200,
            'message' => $mes,
            'data' => $data
        ];
    }
    public function get_extension_image($imagetype)
    {
        if (empty($imagetype)) {
            return false;
        }

        switch ($imagetype) {
            case 'image/bmp':
                return '.bmp';
            case 'image/cis-cod':
                return '.cod';
            case 'image/gif':
                return '.gif';
            case 'image/ief':
                return '.ief';
            case 'image/jpeg':
                return '.jpg';
            case 'image/pipeg':
                return '.jfif';
            case 'image/tiff':
                return '.tif';
            case 'image/x-cmu-raster':
                return '.ras';
            case 'image/x-cmx':
                return '.cmx';
            case 'image/x-icon':
                return '.ico';
            case 'image/x-portable-anymap':
                return '.pnm';
            case 'image/x-portable-bitmap':
                return '.pbm';
            case 'image/x-portable-graymap':
                return '.pgm';
            case 'image/x-portable-pixmap':
                return '.ppm';
            case 'image/x-rgb':
                return '.rgb';
            case 'image/x-xbitmap':
                return '.xbm';
            case 'image/x-xpixmap':
                return '.xpm';
            case 'image/x-xwindowdump':
                return '.xwd';
            case 'image/png':
                return '.png';
            case 'image/x-jps':
                return '.jps';
            case 'image/x-freehand':
                return '.fh';
            default:
                return false;
        }
    }

}
