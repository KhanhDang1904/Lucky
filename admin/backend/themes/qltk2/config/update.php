<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cauhinh */
$this->title = 'Sửa cấu hình: '.$model->name;
$this->params['breadcrumbs'][] = $this->title;
$this->params['active_menu'] = 'config';
?>
<div class="cauhinh-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
