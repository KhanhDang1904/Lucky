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
    <div class="col-md-12 mb-2">
        <?= $form->field($model, 'image')->fileInput(['class' => 'form-control'])->label('Image <span  class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-12 mb-2">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'title'])->label('Title <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'status')->dropDownList(['1'=>'active','0'=>'locked'],['class' => 'form-control select2'])->label('Status') ?>
    </div>
    <div class="col-md-3 mb-2">
        <?= $form->field($model, 'percentage')->textInput(['class' => 'form-control numeral-mask text-right', 'placeholder' => 'Enter percentage'])->label('Percentage <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-3 mb-2">
        <?= $form->field($model, 'total_quantity')->textInput(['class' => 'form-control numeral-mask text-right', 'placeholder' => 'Enter total quantity'])->label('Total quantity <span class="text-danger">*</span>') ?>
    </div>
    <div class="col-md-3 mb-2">
        <?= $form->field($model, 'point')->textInput(['class' => 'form-control numeral-mask text-right', 'placeholder' => 'Enter point'])->label('point <span class="text-danger">*</span>') ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
