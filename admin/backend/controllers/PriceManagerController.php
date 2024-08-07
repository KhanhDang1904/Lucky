<?php

namespace backend\controllers;

use backend\models\Price;
use backend\models\search\PriceSearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\web\Response;

class PriceManagerController extends CoreController
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
        $searchModel = new PriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Price();
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionEdit()
    {
        $model = Price::findOne($this->dataGet['id']);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        $model->note = str_replace('-', ',', $model->note);
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionSave()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($this->dataPost['Price']['id'] === "") {
            $model = new Price();
        } else {
            $model = Price::findOne($this->dataPost['Price']['id']);
            if (is_null($model)) {
                throw new HttpException(500, "Price not found");
            }
        }
        $image = $this->saveImage($model, $model->image);
        if (!is_null($image)) {
            $model->image = $image;
        }
        if (is_null($model->image)){
            throw new HttpException(500, "Image is required");
        }
        if ($this->dataPost['Price']['title'] === "") {
            throw new HttpException(500, "Title is required");
        }
        $model->title = $this->dataPost['Price']['title'];
        $model->note = $this->dataPost['Price']['note'];
        $model->status = $this->dataPost['Price']['status'];
        $model->save();
        return $this->outputSuccess('', 'Price successfully saved');
    }
    public function actionDelete()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = Price::findOne($this->dataPost['id']);
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        $model->active = 0 ;
        $model->save();
        return $this->outputSuccess('', 'Price successfully deleted');
    }
}

