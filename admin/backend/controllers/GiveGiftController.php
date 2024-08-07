<?php

namespace backend\controllers;

use backend\models\search\HistorySearch;
use common\models\myAPI;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class GiveGiftController extends CoreController
{
    public function behaviors()
    {
        $arr_action = ['index','history','gift','update-gift'];
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
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->searchGift(Yii::$app->request->getQueryParams());
        return $this->render('index.php', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
