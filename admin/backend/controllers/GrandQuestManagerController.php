<?php

namespace backend\controllers;

use backend\models\Quest;
use backend\models\search\QuestSearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\Response;

class GrandQuestManagerController extends CoreController
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
        $searchModel = new QuestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new Quest();
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionEdit()
    {
        $model = Quest::findOne($this->dataGet['id']);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionSave()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($this->dataPost['Quest']['id'] === "") {
            $model = new Quest();
        } else {
            $model = Quest::findOne($this->dataPost['Quest']['id']);
            if (is_null($model)) {
                throw new HttpException(500, "Quest not found");
            }
        }
        $image = $this->saveImage($model, $model->image);
        if (!is_null($image)) {
            $model->image = $image;
        }
        if (is_null($model->image)){
            throw new HttpException(500, "Image is required");
        }
        if ($this->dataPost['Quest']['title'] === "") {
            throw new HttpException(500, "Title is required");
        }
        $model->title = $this->dataPost['Quest']['title'];
        $model->note = $this->dataPost['Quest']['note'];
        $model->status = $this->dataPost['Quest']['status'];
        $model->user_id = Yii::$app->user->identity->id;
        if (!$model->save()){
            throw new HttpException(500, Html::errorSummary($model));
        };
        return $this->outputSuccess('', 'Quest successfully saved');
    }
    public function actionDelete()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = Quest::findOne($this->dataPost['id']);
        if (is_null($model)) {
            throw new HttpException(500, "Quest not found");
        }
        $model->active = 0 ;
        $model->save();
        return $this->outputSuccess('', 'Quest successfully deleted');
    }
}

