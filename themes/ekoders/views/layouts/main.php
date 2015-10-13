<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--<title>Blank - eKoders Responsive Admin Theme</title>-->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/fonts.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.min.css">

        <!-- PAGE LEVEL PLUGINS STYLES -->
        <!-- REQUIRE FOR SPEECH COMMANDS -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/plugins/gritter/jquery.gritter.css" />	

        <!-- Tc core CSS -->
        <link id="qstyle" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/themes/style.css">	
        <!--[if lte IE 8]>
                <link rel="stylesheet" href="assets/css/ie-fix.css" />
        <![endif]-->


        <!-- Add custom CSS here -->

        <!-- End custom CSS here -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">
            <div id="main-container">		
                <!-- BEGIN TOP NAVIGATION -->
                <nav class="navbar-top" role="navigation">
                    <!-- BEGIN BRAND HEADING -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="navbar-brand">
                            <a href="index.html">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="logo" class="img-responsive">
                            </a>
                        </div>
                    </div>
                    <!-- END BRAND HEADING -->
                    <div class="nav-top">
                        <!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->
                        <ul class="nav navbar-right">					
                            <li class="dropdown">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </li>
                            <!--                            <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-envelope"></i> <span class="badge up badge-primary">2</span>
                                                            </a>
                                                        </li>-->
                            <!--                            <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-bell"></i> <span class="badge up badge-success">3</span>
                                                            </a>
                                                        </li>-->
                            <!--                            <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-tasks"></i> <span class="badge up badge-info">7</span>
                                                            </a>
                                                        </li>-->
                            <!--Speech Icon-->
                            <!--                            <li class="dropdown">
                                                            <a href="#" class="speech-button">
                                                                <i class="fa fa-microphone"></i>
                                                            </a>
                                                        </li>-->
                            <!--Speech Icon-->
                            <li class="dropdown user-box">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img class="img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user.jpg" alt=""> 
                                    <span class="user-info"> <?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?> </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <?php if (!Yii::app()->user->isGuest): ?>
                                        <li>

                                            <?php echo CHtml::link('<i class="fa fa-user"></i> Mi Cuenta', array('/cruge/ui/editprofile')) ?>

                                        </li>
                                        <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                            <li>
                                                <?php echo CHtml::link('<i class="fa fa-cog"></i> Administración', Yii::app()->user->ui->userManagementAdminUrl) ?>
                                            </li>
                                            <!--<li class="divider"></li>-->
                                        <?php endif; ?>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-power-off"></i>&nbsp;&nbsp;Cerrar Sesión', Yii::app()->user->ui->logoutUrl) ?>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <?php echo CHtml::link('<i class="fa fa-power-off"></i> Iniciar Sesión', Yii::app()->user->ui->loginUrl) ?>
                                        </li>
                                    <?php endif; ?>
                                    <!-- <li>
                                                                                <a href="profile.html">
                                                                                    <i class="fa fa-user"></i>My Profile
                                                                            </a>
                                                                        </li>-->
                                </ul>
                            </li>
                            <!--Search Box-->
                            <!--                            <li class="dropdown nav-search-icon">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <span class="glyphicon glyphicon-search"></span>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-search">
                                                                <li>
                                                                    <div class="search-box">
                                                                        <form class="" role="search">
                                                                            <input type="text" class="form-control" placeholder="Search" />
                                                                        </form>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>-->
                            <!--Search Box-->
                        </ul>
                        <!-- END RIGHT SIDE DROPDOWN BUTTONS -->							
                        <!-- BEGIN TOP MENU -->
                        <!--                        <div class="collapse navbar-collapse top-collapse">
                                                     .nav 
                                                    <ul class="nav navbar-left navbar-nav">
                                                        <li><a href="index.html">Dashboard</a></li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                Pages <b class="caret"></b>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li> <a href="pricing.html">Pricing</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="front/index.html">FrontEnd <span class="badge badge-primary">New</span></a></li>
                                                    </ul> /.nav 
                                                </div>
                                                 END TOP MENU 
                                            </div>-->
                        <!-- /.nav-top -->
                </nav><!-- /.navbar-top -->
                <!-- END TOP NAVIGATION -->


                <!-- BEGIN SIDE NAVIGATION -->				
                <nav class="navbar-side" role="navigation">
                    <div class="navbar-collapse sidebar-collapse collapse">

                        <!-- BEGIN SHORTCUT BUTTONS -->
                        <!--                        <div class="media">							
                                                    <ul class="sidebar-shortcuts">
                                                        <li><a class="btn"><i class="fa fa-user icon-only"></i></a></li>
                                                        <li><a class="btn"><i class="fa fa-envelope icon-only"></i></a></li>
                                                        <li><a class="btn"><i class="fa fa-th icon-only"></i></a></li>
                                                        <li><a class="btn"><i class="fa fa-gear icon-only"></i></a></li>
                                                    </ul>	
                                                </div>-->
                        <!-- END SHORTCUT BUTTONS -->	

                        <!-- BEGIN FIND MENU ITEM INPUT -->
                        <!--                        <div class="media-search">	
                                                    <input type="text" class="input-menu" id="input-items" placeholder="Find...">
                                                </div>						-->
                        <!-- END FIND MENU ITEM INPUT -->


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
                        <!--                        <ul id="side1" class="nav navbar-nav side-nav">
                                                     BEGIN SIDE NAV MENU 
                                                     Navigation category 
                                                    <li>
                                                        <h4>Navigation</h4> 								
                                                    </li>
                                                     END Navigation category 
                        
                        
                        
                        
                                                    <li>
                                                        <a class="active" href="index.html">
                                                            <i class="fa fa-dashboard"></i> Dashboard
                                                        </a>
                                                    </li>
                                                     BEGIN DROPDOWN 
                                                    <li class="panel">
                                                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms">
                                                            <i class="fa fa-cogs"></i> Elements <span class="fa arrow"></span>
                                                        </a>
                                                        <ul class="collapse nav" id="forms">
                                                            <li>
                                                                <a href="jquery-ui.html">
                                                                    <i class="fa fa-angle-double-right"></i> jQuery UI 
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                     END DROPDOWN 
                                                </ul>-->
                        <!-- /.side-nav -->

                        <!--                        <div class="sidebar-labels">
                                                    <h4>Labels</h4>							
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-circle-o text-primary"></i> My Recent <span class="badge badge-primary">3</span></a></li>
                                                        <li><a href="#"><i class="fa fa-circle-o text-success"></i> Background</a></li>
                                                    </ul>
                                                </div>-->

                        <!--                        <div class="sidebar-alerts">							
                                                    <div class="alert fade in">
                                                        <span>Sales Report</span>
                                                        <div class="progress progress-mini progress-striped active no-margin-bottom">
                                                            <div class="progress-bar progress-bar-primary" style="width: 36%"></div>
                                                        </div>
                                                        <small>Calculating daily bias... 36%</small>
                                                    </div>
                                                </div>-->

                    </div><!-- /.navbar-collapse -->
                </nav><!-- /.navbar-side -->
                <!-- END SIDE NAVIGATION -->


                <!-- BEGIN MAIN PAGE CONTENT -->
                <div id="page-wrapper">
                    <!-- BEGIN PAGE HEADING ROW -->
                    <!--                    <div class="row">
                                        <div class="col-lg-12">
                                         BEGIN BREADCRUMB 
                                        <div class="breadcrumbs">
                                                                        <ul class="breadcrumb">
                                                                            <li>
                                                                                <a href="#">Home</a>
                                                                            </li>
                                                                            <li>Pages</li>
                                                                            <li class="active">Blank</li>
                                                                        </ul>
                    
                                        <div class="b-right hidden-xs">
                                        <ul>
                    <li><a href="#" title=""><i class="fa fa-signal"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-comments"></i></a></li>
                    <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                    <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="#">Add new task</a></li>
                    <li><a href="#">Statement</a></li>
                    <li><a href="#">Settings</a></li>
                    </ul>
                    </li>
                    </ul>
                    </div>-->
                    <!--</div>-->
                    <!-- END BREADCRUMB -->	

                    <!--                    <div class="page-header title">
                                             PAGE TITLE ROW 
                                            <h1>Titulo <span class="sub-title">sub titulo</span></h1>								
                                        </div>-->


                    <!--</div>-->
                    <!-- /.col-lg-12 -->
                    <!--</div>-->
                    <!-- /.row -->
                    <!-- END PAGE HEADING ROW -->	
<?php echo $content; ?>
                    <!--                    <div class="row">
                                            <div class="col-lg-12">
                    
                                                 START YOUR CONTENT HERE 
                                                <p>This is a light-weight blank page, with minimum to none plugins loaded</p>
                                                 END YOUR CONTENT HERE 
                    
                                            </div>
                                        </div>-->

                    <!-- BEGIN FOOTER CONTENT -->		
                    <div class="footer ">
                        <div class="footer-inner">
                            <!-- basics/footer -->
                            <div class="footer-content">
                                &copy; 2015 <a href="#">DriveWorkHouse</a>, Todos los derechos reservados.
                            </div>
                            <!-- /basics/footer -->
                        </div>
                    </div>
                    <button type="button" id="back-to-top" class="btn btn-primary btn-sm back-to-top">
                        <i class="fa fa-angle-double-up icon-only bigger-110"></i>
                    </button>
                    <!-- END FOOTER CONTENT -->

                </div><!-- /#page-wrapper -->	  
                <!-- END MAIN PAGE CONTENT -->
            </div>  
        </div> 

        <!-- core JavaScript -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/pace/pace.min.js"></script>

        <!-- PAGE LEVEL PLUGINS JS -->

        <!-- Themes Core Scripts -->	
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>

        <!-- REQUIRE FOR SPEECH COMMANDS -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/speech-commands.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/gritter/jquery.gritter.min.js"></script>	

        <!-- initial page level scripts for examples -->	
    </body>
</html>