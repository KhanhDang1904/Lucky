<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cauhinh */
$this->title = 'Edit : '.$model->name;
$this->params['breadcrumbs'][] = $this->title;
$this->params['active_menu'] = 'config';
?>
<?php $form = ActiveForm::begin(['action'=>'update-background']); ?>

<div class="row">
    <div class="col-md-4 offset-md-4 col-sm-offset-0 col-sm-12">
        <img class="over-fit" width="100%" src="<?=$model->image?>" onerror="this.src='/admin/upload-file/background.png'" alt="">
        <div class="mt-3">
            <?= $form->field($model, 'image')->fileInput(['class'=>'form-control mt-2','onchange'=>"readURL(this,'.over-fit')"])->label('Select image') ?>
            <small class="text-danger">Size image: 400 x 800 px</small>
        </div>
        <div class="form-group mt-3">
            <?= Html::submitButton('Submit', ['class' =>  'btn btn-primary w-100 btn-submit d-none']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>