<?php
//
//namespace backend\controllers;
//
//use backend\models\Package;
//use backend\models\search\PackageSearch;
//use common\models\myAPI;
//use Yii;
//use yii\filters\AccessControl;
//use yii\filters\VerbFilter;
//use yii\helpers\Html;
//use yii\web\HttpException;
//use yii\web\Response;
//
//class PackageController extends CoreController
//{
//    public function behaviors()
//    {
//        $arr_action = ['index', 'add', 'edit', 'save','delete'];
//        $rules = [];
//        foreach ($arr_action as $item) {
//            $rules[] = [
//                'actions' => [$item],
//                'allow' => true,
//                'matchCallback' => function ($rule, $action) {
//                    $action_name = strtolower(str_replace('action', '', $action->id));
//                    return myAPI::isAccess2('User', $action_name);
//                }
//            ];
//        }
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => $rules,
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                    'bulk-delete' => ['post'],
//                ],
//            ],
//        ];
//    }
//
//    public function actionIndex()
//    {
//        $searchModel = new PackageSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        return $this->render('index.php', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    public function actionAdd()
//    {
//        $model = new Package();
//        return $this->renderPartial('_form', ['model' => $model]);
//    }
//
//    public function actionEdit()
//    {
//        $model = Package::findOne($this->dataGet['id']);
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//        if (is_null($model)) {
//            throw new HttpException(500, "Price not found");
//        }
//        return $this->renderPartial('_form', ['model' => $model]);
//    }
//
//    public function actionSave()
//    {
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//
//
//        if ($this->dataPost['Package']['id'] === "") {
//            $model = new Package();
//        } else {
//            $model = Package::findOne($this->dataPost['Package']['id']);
//            if (is_null($model)) {
//                throw new HttpException(500, "Package not found");
//            }
//        }
//        $image = $this->saveImage($model, $model->image);
//        if (!is_null($image)) {
//            $model->image = $image;
//        }
//        if (is_null($model->image)){
//            throw new HttpException(500, "Image is required");
//        }
//        if ($this->dataPost['Package']['title'] === "") {
//            throw new HttpException(500, "Title is required");
//        }
//        if ($this->dataPost['Package']['total_spin'] === "") {
//            throw new HttpException(500, "Total spin is required");
//        }
//        if ($this->dataPost['Package']['price'] === "") {
//            throw new HttpException(500, "Price is required");
//        }
//        $model->title = $this->dataPost['Package']['title'];
//        $model->total_spin = $this->dataPost['Package']['total_spin'];
//        $model->price = $this->dataPost['Package']['price'];
//        $model->note = $this->dataPost['Package']['note'];
//        $model->status = $this->dataPost['Package']['status'];
//        $model->price = !empty($model->price) ? str_replace(',','',$model->price) : 0;
//        $model->total_spin = !empty($model->total_spin) ? str_replace(',','',$model->total_spin) : 0;
//        $model->user_id = Yii::$app->user->identity->id;
//        if (!$model->save()){
//            throw new HttpException(500, Html::errorSummary($model));
//        };
//        return $this->outputSuccess('', 'Package successfully saved');
//    }
//    public function actionDelete()
//    {
//        \Yii::$app->response->format = Response::FORMAT_JSON;
//        $model = Package::findOne($this->dataPost['id']);
//        if (is_null($model)) {
//            throw new HttpException(500, "Package not found");
//        }
//        $model->active = 0 ;
//        $model->save();
//        return $this->outputSuccess('', 'Package successfully deleted');
//    }
//}
//
