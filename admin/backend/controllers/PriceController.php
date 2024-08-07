<?php namespace backend\controllers;
use backend\models\Price;
class PriceController extends CoreApiController
{
    public function actionIndex()
    {
        $models = Price::find()->andFilterWhere(['active'=>1,'status'=>1])->all();
        $data = [];
        /** @var Price $model */
        foreach ($models as $model) {
            $data[] = [
                'id' => $model->id,
                'title' => $model->title,
                'image' => $model->image,
                'note' => $model->note,
            ];
        }
        return $this->outputSuccess($data);
    }
}
