<?php

namespace backend\controllers;

use backend\models\RotationConfig;
use backend\models\search\RotationConfigSearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\Response;

class WheelController extends CoreController
{
    public function behaviors()
    {
        $arr_action = ['index', 'add', 'edit', 'save','delete'];
        $rules = [];
        foreach ($arr_action as $item) {
            $rules[] = [
                'actions' => [$item],
                'allow' => true,
                'matchCallback' => function ($rule, $action) {
                    $action_name = strtolower(str_replace('action', '', $action->id));
                    return myAPI::isAccess2('User', $action_name);
                }
            ];
        }
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $rules,
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new RotationConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new RotationConfig();
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionEdit()
    {
        $model = RotationConfig::findOne($this->dataGet['id']);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionSave()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($this->dataPost['RotationConfig']['id'] === "") {
            $model = new RotationConfig();
        } else {
            $model = RotationConfig::findOne($this->dataPost['RotationConfig']['id']);
            if (is_null($model)) {
                throw new HttpException(500, "RotationConfig not found");
            }
        }
        $image = $this->saveImage($model, $model->image);
        if (!is_null($image)) {
            $model->image = $image;
        }
        if (is_null($model->image)){
            throw new HttpException(500, "Image is required");
        }
        if ($this->dataPost['RotationConfig']['title'] === "") {
            throw new HttpException(500, "Title is required");
        }
        if ($this->dataPost['RotationConfig']['percentage'] === "") {
            throw new HttpException(500, "percentage is required");
        }
        if ($this->dataPost['RotationConfig']['total_quantity'] === "") {
            throw new HttpException(500, "Total quantity is required");
        }
        if ($this->dataPost['RotationConfig']['point'] === "") {
            throw new HttpException(500, "point is required");
        }

        $model->title = $this->dataPost['RotationConfig']['title'];
        $model->percentage = $this->dataPost['RotationConfig']['percentage'];
        $model->total_quantity = $this->dataPost['RotationConfig']['total_quantity'];
        $model->point = $this->dataPost['RotationConfig']['point'];
        $model->status = $this->dataPost['RotationConfig']['status'];
        $model->percentage = !empty($model->percentage) ? str_replace(',','',$model->percentage) : 0;
        $model->total_quantity = !empty($model->total_quantity) ? str_replace(',','',$model->total_quantity) : 0;
        $model->point = !empty($model->point) ? str_replace(',','',$model->point) : 0;
        $model->user_id = Yii::$app->user->identity->id;
        if (!$model->save()){
            throw new HttpException(500, Html::errorSummary($model));
        };
        return $this->outputSuccess('', 'RotationConfig successfully saved');
    }
    public function actionDelete()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = RotationConfig::findOne($this->dataPost['id']);
        if (is_null($model)) {
            throw new HttpException(500, "RotationConfig not found");
        }
        $model->active = 0 ;
        $model->save();
        return $this->outputSuccess('', 'RotationConfig successfully deleted');
    }
}

