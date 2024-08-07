<?php

namespace backend\controllers;

use backend\models\DailyQuest;
use backend\models\search\DailyQuestSearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\Response;

class DailyQuestManagerController extends CoreController
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
        $searchModel = new DailyQuestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new DailyQuest();
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionEdit()
    {
        $model = DailyQuest::findOne($this->dataGet['id']);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (is_null($model)) {
            throw new HttpException(500, "Price not found");
        }
        return $this->renderPartial('_form', ['model' => $model]);
    }

    public function actionSave()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;


        if ($this->dataPost['DailyQuest']['id'] === "") {
            $model = new DailyQuest();
        } else {
            $model = DailyQuest::findOne($this->dataPost['DailyQuest']['id']);
            if (is_null($model)) {
                throw new HttpException(500, "Daily Quest not found");
            }
        }
        $image = $this->saveImage($model, $model->image);
        if (!is_null($image)) {
            $model->image = $image;
        }
        if (is_null($model->image)){
            throw new HttpException(500, "Image is required");
        }
        if ($this->dataPost['DailyQuest']['title'] === "") {
            throw new HttpException(500, "Title is required");
        }
        $model->title = $this->dataPost['DailyQuest']['title'];
        $model->note = $this->dataPost['DailyQuest']['note'];
        $model->status = $this->dataPost['DailyQuest']['status'];
        $model->user_id = Yii::$app->user->identity->id;
        if (!$model->save()){
            throw new HttpException(500, Html::errorSummary($model));
        };
        return $this->outputSuccess('', 'Daily Quest successfully saved');
    }
    public function actionDelete()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $model = DailyQuest::findOne($this->dataPost['id']);
        if (is_null($model)) {
            throw new HttpException(500, "Daily Quest not found");
        }
        $model->active = 0 ;
        $model->save();
        return $this->outputSuccess('', 'Daily Quest successfully deleted');
    }
}

