<?php

namespace backend\controllers;

use Yii;
use backend\models\CauHinh;
use backend\models\search\CauhinhSearch;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use yii\helpers\Html;

class ConfigController extends CoreController
{
    /** index */
    public function actionIndex()
    {
        $searchModel = new CauhinhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /** view */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Cấu hình #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('<i class="fa fa-close"></i> Đóng lại',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('<i class="fa fa-edit"></i> Cập nhật',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /** create */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Cauhinh();

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Thêm mới cấu hình",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-close"></i> Đóng lại',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('<i class="fa fa-save"></i> Lưu lại',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Thêm mới cấu hình",
                    'content'=>'<span class="text-success">Thêm mới cấu hình thành công!</span>',
                    'footer'=> Html::button('<i class="fa fa-close"></i> Đóng lại',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('<i class="glyphicon glyphicon-plus"></i> Tạo thêm',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> "Thêm mới cấu hình",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('<i class="fa fa-close"></i> Đóng lại',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('<i class="fa fa-save"></i> Lưu lại',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }
        }else{
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /** update */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /** delete */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            return $this->redirect(['index']);
        }


    }

     /** bulk-delete */
    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' ));
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            return $this->redirect(['index']);
        }

    }

    protected function findModel($id)
    {
        if (($model = CauHinh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionBackground()
    {
        $model = CauHinh::findOne(CauHinh::BACKGROUND);
        /** @var CauHinh $model */
        if (is_null($model)){
            $model = new CauHinh();
            $model->id = CauHinh::BACKGROUND;
            $model->save();
        }
        return $this->render('background', ['model' => $model]);

    }
    public function actionUpdateBackground()
    {
        $model = CauHinh::findOne(CauHinh::BACKGROUND);
        $image = $this->saveImage($model);
        if (!is_null($image)){
            $model->image = $image;
        }
        $model->save();
        return $this->redirect(['background']);
    }
}
