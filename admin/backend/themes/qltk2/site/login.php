<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/lucky/img/mytelpay-logo%201.png" rel="icon">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/css/style.css" rel="stylesheet">
</head>
<body>
<main>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false, 'class' => 'login-form']); ?>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="/admin" class="logo d-flex align-items-center w-auto">
                                <img width="200%" src="/assets/lucky/img/mytelpay-logo%201.png" alt="">
<!--                                <span class="d-none d-lg-block">MytelPay</span>-->
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3" style="min-width: 350px">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                </div>

                                <form class="row g-3 needs-validation" novalidate>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <?=Html::activeTextInput($model, 'username',['autofocus' => true, 'class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'username'])?>
                                        <?=Html::error($model, 'username',['class' => 'form-subtitle text-danger'])?>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <?=Html::activePasswordInput($model, 'password',['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'new-password', 'placeholder' => 'password'])?>
                                        <?=Html::error($model, 'password',['class' => 'form-subtitle text-danger'])?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/quill/quill.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/main.js"></script>

</body>

</html>