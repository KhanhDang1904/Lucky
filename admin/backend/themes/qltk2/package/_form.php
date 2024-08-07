<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Package */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>
<div class="d-none">
    <?=$form->field($model,'id')->hiddenInput()?>
</div>
<div class="row" >
    <div class="col-md-8 mb-2">
        <?= $form->field($model, 'image')->fileInput(['class' => 'form-control'])->label('Image <span  class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'status')->dropDownList(['1'=>'active','0'=>'locked'],['class' => 'form-control select2'])->label('Status') ?>
    </div>
    <div class="col-md-12 mb-2">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'title'])->label('Title <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-6 mb-2">
        <?= $form->field($model, 'total_spin')->textInput(['class' => 'form-control numeral-mask text-right', 'placeholder' => 'Enter total_spin'])->label('Spin <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-6 mb-2">
        <?= $form->field($model, 'price')->textInput(['class' => 'form-control numeral-mask text-right', 'placeholder' => 'Enter price'])->label('Price <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-12 mb-2">
        <?= $form->field($model, 'note')->textarea(['class' => 'form-control', 'placeholder' => 'Enter note'])->label('Note') ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
