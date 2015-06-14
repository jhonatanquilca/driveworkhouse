<!DOCTYPE html>
<html>

    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!--<meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />-->
        <!--<meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">-->
        <!--<meta name="author" content="AdminDesigns">-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

        <!-- Font CSS (Via CDN) -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

    </head>

    <body class="blank-page">

        <!-- Start: Main -->
        <div id="main">

            <!-- Start: Header -->
            <header class="navbar navbar-fixed-top bg-dark">
                <div class="navbar-branding">
                    <a class="navbar-brand" href="dashboard.html">
                        <b>Admin</b>Designs
                    </a>
                    <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="ad ad-radio-tower fs18"></span>
                        </a>
                        <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
                            <li class="dropdown-header">
                                <span class="dropdown-title"> Notifications</span>
                                <span class="label label-warning">12</span>
                            </li>
                            <li class="media">
                                <a class="media-left" href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
                                <div class="media-body">
                                    <h5 class="media-heading">Article
                                        <small class="text-muted">- 08/16/22</small>
                                    </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-left" href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mv5">Article
                                        <small> - 08/16/22</small>
                                    </h5>
                                    Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-left" href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
                                <div class="media-body">
                                    <h5 class="media-heading">Article
                                        <small class="text-muted">- 08/16/22</small>
                                    </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-left" href="#"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
                                <div class="media-body">
                                    <h5 class="media-heading mv5">Article
                                        <small class="text-muted">- 08/16/22</small>
                                    </h5> Last Updated 36 days ago by
                                    <a class="text-system" href="#"> Max </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="flag-xs flag-us"></span> US
                        </a>
                        <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="flag-xs flag-in mr10"></span> Hindu </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="flag-xs flag-tr mr10"></span> Turkish </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="flag-xs flag-es mr10"></span> Spanish </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-divider hidden-xs">
                        <i class="fa fa-circle"></i>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15"> 
                            <!--<a class="aweso-user"></a>-->
                            <?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?>
                            <span class="caret caret-tp hidden-xs"></span>
                        </a>

                        <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">                            

<!--                            <li class="list-group-item">
                                <a href="#" class="animated animated-short fadeInUp">
                                    <span class="fa fa-envelope"></span> Messages
                                    <span class="label label-warning">2</span>
                                </a>
                            </li>-->
                                              <?php if (!Yii::app()->user->isGuest): ?>
                                            <li class="list-group-item">

                                                <?php echo CHtml::link('<span class="fa fa-user"></span> Mi Cuenta', array('/cruge/ui/editprofile'),array('class'=>'animated animated-short fadeInUp')) ?>

                                            </li>
                                            <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                                <li class="list-group-item">
                                                    <?php echo CHtml::link('<span class="fa fa-cog"></span> Administración', Yii::app()->user->ui->userManagementAdminUrl,array('class'=>'animated animated-short fadeInUp')) ?>
                                                </li>
                                            <?php endif; ?>
                                            <li class="list-group-item">
                                                <?php echo CHtml::link('<span class="fa fa-power-off"></span> Cerrar Sesión', Yii::app()->user->ui->logoutUrl,array('class'=>'animated animated-short fadeInUp')) ?>
                                            </li>
                                        <?php else: ?>
                                            <li class="list-group-item">
                                                <?php echo CHtml::link('<span class="fa fa-power-off"></span> Iniciar Sesión', Yii::app()->user->ui->loginUrl,array('class'=>'animated animated-short fadeInUp')) ?>
                                            </li>
                                        <?php endif; ?>
                                    </ul>

            </header>
            <!-- End: Header -->

            <!-- Start: Sidebar -->
            <aside id="sidebar_left" class="nano nano-primary affix has-scrollbar">

                <!-- Start: Sidebar Left Content -->
                <div class="sidebar-left-content nano-content" >
                    <!-- Start: Sidebar Menu -->
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => isset($this->admin) && $this->admin ? Menu::getAdminMenu($this) : Menu::getMenu($this), //                         
                        'encodeLabel' => false,
                        //Descomentar si se necesita que todos los items <li> tengan una sola clase
//                    'itemCssClass' => 'active',
                        'activeCssClass' => 'active',
                        'htmlOptions' => array('class' => 'nav sidebar-menu'),
                        //class  para el submenu
                        'submenuHtmlOptions' => array('class' => 'nav sub-nav')
                    ));
                    ?>

                </div>
                <!-- End: Sidebar Left Content -->

            </aside>

            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">
                <!-- Start: Topbar -->
                <header id="topbar">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="crumb-active">
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="crumb-icon">
                                <a href="dashboard.html">
                                    <span class="glyphicon glyphicon-home"></span>
                                </a>
                            </li>
                            <li class="crumb-link">
                                <a href="index-2.html">Home</a>
                            </li>
                            <li class="crumb-trail">Dashboard</li>
                        </ol>
                    </div>

                </header>
                <!-- End: Topbar -->

                <!-- Begin: Content -->
                <section id="content" class="animated fadeIn">
                    <?php echo $content; ?>
                </section>
                <!-- End: Content -->

            </section>

            <!-- Start: Right Sidebar -->

            <!-- End: Right Sidebar -->

        </div>
        <!-- End: Main -->

        <!-- BEGIN: PAGE SCRIPTS -->

        <!-- jQuery -->
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>-->
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>-->

        <!-- Theme Javascript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/utility/utility.js"></script>
        <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/demo/demo.js"></script>-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
        <script type="text/javascript">
//              jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS  
//                Demo.init();

//              });
        </script>
        <!-- END: PAGE SCRIPTS -->

    </body>
</html>
