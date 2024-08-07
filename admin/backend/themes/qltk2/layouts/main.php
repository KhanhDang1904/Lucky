<?php
if (Yii::$app->user->isGuest){
    header('Location: /admin/login');
}
$this->beginPage();
\backend\assets\Qltk2Asset::register($this);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?=\yii\helpers\Html::encode($this->title); ?></title>
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
    <link rel='stylesheet' href='/assets/lucky/css/sweetalert.css'>
    <!-- Template Main CSS File -->
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/css/style.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/css/select2.min.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/css/jquery.tagsinput-revisited.css" rel="stylesheet">
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/jquery.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/select2.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/jquery.tagsinput-revisited.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/jquery-ui.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/cleave.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/themes/qltk2/assets/js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="/assets/toastr.css">
    <script src="/assets/toastr.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/backend/assets/js-view/model.js"></script>
    <!-- =======================================================
    * Template Name: NiceAdmin - v2.4.1
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<input id="token_form" data-params="<?=Yii::$app->request->csrfParam?>" class="d-none" value="<?=Yii::$app->request->csrfToken?>">
<!-- ======= Header ======= -->
<?= $this->render('header.php'); ?>
<?= $this->render('_menu.php'); ?>
<?= $this->render('content.php',['content'=>$content]); ?>
<!-- ======= Sidebar ======= -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Mytelpay</span></strong>. All Rights Reserved
    </div>

</footer><!-- End Footer -->

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