<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $exception->getMessage();
?>
<?php if (Yii::$app->user->isGuest): ?>
    <script>window.location.href = '/admin/site/login'</script>
<?php endif;?>
<div class="alert alert-danger">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/backend/themes/qltk2/assets/global/plugins/bootstrap/js/bootstrap.min.js',[ 'depends' => ['backend\assets\Qltk2Asset'], 'position' => \yii\web\View::POS_END ]); ?>
