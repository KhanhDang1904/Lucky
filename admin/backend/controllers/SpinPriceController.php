<?php

namespace backend\controllers;

use backend\models\SpinPrice;
use backend\models\search\SpinPriceSearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use yii\web\Response;

class SpinPriceController extends CoreController
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
        $searchModel = new SpinPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new SpinPrice();
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionEdit()
    {
        $model = SpinPrice::findOne(['id'=>$this->dataGet['id'],'active'=>1]);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionSave()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($this->dataPost['SpinPrice']['id'] === "") {
            $model = new SpinPrice();
        } else {
            $model = SpinPrice::findOne($this->dataPost['SpinPrice']['id']);
            if (is_null($model)) {
                throw new HttpException(500, "SpinPrice not found");
            }
        }
        $image = $this->saveImage($model, $model->image);
        if (!is_null($image)) {
            $model->image = $image;
        }
        if (is_null($model->image)){
            throw new HttpException(500, "Image is required");
        }
        if ($this->dataPost['SpinPrice']['title'] === "") {
            throw new HttpException(500, "Title is required");
        }
        if ($this->dataPost['SpinPrice']['quantity'] === "") {
            throw new HttpException(500, "Spin is required");
        }
        if ($this->dataPost['SpinPrice']['price'] === "") {
            throw new HttpException(500, "Price is required");
        }
        $model->title = $this->dataPost['SpinPrice']['title'];
        $model->price = $this->dataPost['SpinPrice']['price'];
        $model->quantity = $this->dataPost['SpinPrice']['quantity'];
        $model->price = !empty($model->price) ? str_replace(',','',$model->price) : 0;
        $model->quantity = !empty($model->quantity) ? str_replace(',','',$model->quantity) : 0;
        $model->user_id = Yii::$app->user->identity->id;
        if (!$model->save()){
            throw new HttpException(500, Html::errorSummary($model));
        };
        return $this->outputSuccess('', 'Spin Price successfully saved');
    }
    public function actionDelete()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = SpinPrice::findOne($this->dataPost['id']);
        if (is_null($model)) {
            throw new HttpException(500, "Spin Price not found");
        }
        $model->active = 0 ;
        $model->save();
        return $this->outputSuccess('', 'Spin Price successfully deleted');
    }
}

