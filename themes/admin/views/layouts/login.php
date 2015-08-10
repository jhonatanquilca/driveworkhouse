<!DOCTYPE html>
<html lang="es">


    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!--<meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />-->
        <!--<meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">-->
        <!--<meta name="author" content="AdminDesigns">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Font CSS (Via CDN) -->
        <link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/font-family.css'>

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css">

        <!-- Admin Forms CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin-forms.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
         <![endif]-->
    </head>

    <body class="external-page external-alt sb-l-c sb-r-c">

        <!-- Start: Main -->
        <div id="main" class="animated fadeIn">

            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">

                <!-- begin canvas animation bg -->
                <div id="canvas-wrapper">
                    <canvas id="demo-canvas"></canvas>
                </div>

                <!-- Start: Content-Wrapper -->
                <!--<section id="content_wrapper">-->

                <!-- Begin: Content -->
                <section id="content">

                    <div class="admin-form theme-info mw500" id="login">

                        <!-- Login Logo -->
                        <div class="row table-layout">
                            <a href="dashboard.html" title="Return to Dashboard">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logos/logo.png" title="AdminDesigns Logo" class="center-block img-responsive" style="max-width: 275px;">
                            </a>
                        </div>

                        <!-- Login Panel/Form -->


                        <?php echo $content ?>

                    </div>

                </section>
                <!-- End: Content -->

                <!--</section>-->
                <!-- End: Content-Wrapper -->


            </section>
            <!-- End: Content-Wrapper -->

        </div>
        <!-- End: Main -->

        <!-- BEGIN: PAGE SCRIPTS -->

        <!-- jQuery -->
                               <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>

        <!-- CanvasBG Plugin(creates mousehover effect) -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/canvasbg/canvasbg.js"></script>

        <!-- Theme Javascript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/utility/utility.js"></script>
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/demo/demo.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <!-- Page Javascript -->
        <script type="text/javascript">
            jQuery(document).ready(function () {

                "use strict";

                // Init Theme Core      
                Core.init();

                // Init Demo JS
//                Demo.init();

                // Init CanvasBG and pass target starting location
                CanvasBG.init({
                    Loc: {
                        x: window.innerWidth / 2,
                        y: window.innerHeight / 3.3
                    },
                });

            });
        </script>

        <!-- END: PAGE SCRIPTS -->

    </body>


    <!-- Mirrored from admindesigns.com/demos/admin/theme/pages_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Jun 2015 22:15:34 GMT -->
</html>
