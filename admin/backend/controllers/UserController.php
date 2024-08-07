<?php

namespace backend\controllers;

use backend\models\HistoryReward;
use backend\models\search\HistorySearch;
use backend\models\search\PackageUserSearch;
use common\models\myAPI;
use common\models\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class UserController extends CoreController
{
    public function behaviors()
    {
        $arr_action = ['index','history','gift','update-gift','package'];
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionHistory()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams(),$this->dataGet['id']);
        return $this->renderPartial('modal/history/_table.php', [
            'dataProvider' => $dataProvider,
            'id'=>$this->dataGet['id']
        ]);
    }
    public function actionGift()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->searchGift(Yii::$app->request->getQueryParams(),$this->dataGet['id']);
        return $this->renderPartial('modal/gift/_table.php', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPackage()
    {
        $searchModel = new PackageUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams(),$this->dataGet['id']);
        return $this->renderPartial('modal/package/_table.php', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public  function actionUpdateGift()
    {
        $history = HistoryReward::findOne($this->dataPost['id']);
        if (!is_null($history)){
            $history->status = 1;
            $history->save();
        }
        return true;
    }
}
