<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Informasi Perekonomian | Biro Administrasi Perekonomian Dan Sumber Daya Alam</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo e(asset('template/favicon.ico')); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->

    <link href="<?php echo e(asset('template/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo e(asset('template/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo e(asset('template/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo e(asset('template/plugins/morrisjs/morris.css')); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo e(asset('template/css/style.css')); ?>" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?php echo e(asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo e(asset('template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo e(asset('template/plugins/waitme/waitMe.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo e(asset('template/plugins/bootstrap-select/css/bootstrap-select.css')); ?>" rel="stylesheet" />


    <!-- Sweetalert Css -->
    <link href="<?php echo e(asset('template/plugins/sweetalert/sweetalert.css')); ?>" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo e(asset('template/css/themes/all-themes.css')); ?>" rel="stylesheet" />

    <style rel="stylesheet" >

        div.myClass {
        overflow-x: auto;
        white-space: nowrap;
        }

          div.myClass [class*="span"] {
              display: inline-block;
              float: none; /* Very important */
          }

          /* Test purposes */
          .myClass .span5 {margin-top: 5px;min-height: 50px; }
          div.myClass {

              margin-left: auto;
              margin-right: auto;
          }
          ::-webkit-scrollbar {
            width: 5px;
            height: 10px;
background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-track {
              -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
border-radius: 5px;
background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb {
              border-radius: 5px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
            }

    </style>


</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">    SIM<b>PERKOM</b> | Sistem informasi Perekonomian - Provinsi Riau</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <!--
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>  -->
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                      <!--
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <?php if(!Auth::check()): ?>

                    <div  class="col-sm-3 m-t-10"> <center> <img src="<?php echo e(asset('images/logo.png')); ?>" width="60" /></center></div>
                    <div  class="col-sm-9 m-t-10">


                     <div class="font-25"> SIM<b>PERKOM</b></font> <br> </div>
                     <small>Sistem informasi Perekonomian</small>
                     <br>Provinsi Riau


                    </div>
                <?php else: ?>
                    <div class="image">
                        <img src="<?php if(Auth::user()->gambar!=''): ?> <?php echo e(asset('/'.Auth::user()->gambar)); ?> <?php else: ?> <?php echo e(asset('images/user.png')); ?>  <?php endif; ?> " width="48" height="48" alt="User" />
                    </div>
                      <div class="info-container">
                          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
                          <div class="email"><?php echo e(Auth::user()->email); ?></div>
                          <div class="btn-group user-helper-dropdown">
                              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                              <ul class="dropdown-menu pull-right">

                                  <li><a href="<?php echo e(url('/profile/'.Auth::user()->id)); ?>"><i class="material-icons">person</i>Profile</a></li>

                                  <li role="seperator" class="divider"></li>
                                  <li><a href="javascript:void(0);">
                                  <li><a href="<?php echo e(url('/logout')); ?>"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Sign Out</a>
                                  </a>

                                  <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                      <?php echo e(csrf_field()); ?>

                                  </form>
                                  </li>
                              </ul>
                          </div>
                      </div>
                <?php endif; ?>

            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo e(url('/')); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                     <?php if(Auth::check() and (Auth::user()->level==0 or Auth::user()->level==1)): ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Master Table</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('/master')); ?>">Master Table</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/masterdetail')); ?>">Table Field</a>
                            </li>
                            <li>
                                  <a href="<?php echo e(url('/list')); ?>">List</a>
                            </li>
                            <li>
                                  <a href="<?php echo e(url('/listdetail')); ?>">List Detail</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/view')); ?>">View</a>
                            </li>

                        </ul>
                    </li>
                    <?php endif; ?>



                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">account_balance</i>
                                <span>Data Perekonomian</span>
                            </a>
                            <ul class="ml-menu">

                                <?php  $bidang = DB::table('tb_list_detail')->where('id_list', '=', '1')->get();  ?>
                                <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <li>
                                      <a href="<?php echo e(url('/data/bidang/'.$bidang->id)); ?>"><?php echo e($bidang->nama); ?></a>
                                  </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                            </ul>
                        </li>


                    <li>
                        <a href="<?php echo e(url('/record')); ?>">
                            <i class="material-icons">input</i>
                            <span>Input Data</span>
                        </a>
                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">lock</i>
                            <span>Admin Area</span>
                        </a>
                        <ul class="ml-menu">
                            <?php if(!Auth::check()): ?>
                            <li>

                                  <a href="<?php echo e(url('/login')); ?>">
                                      <i class="material-icons">person</i>
                                      <span>Sign In</span>
                                  </a>
                            </li>
                            <?php endif; ?>

                             <?php if(Auth::check() and Auth::user()->level==0): ?>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">assignment</i>
                                    <span>Data Master</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                          <a href="<?php echo e(url('/tahun')); ?>">Tahun</a>
                                    </li>
                                    <li>
                                          <a href="<?php echo e(url('/opd')); ?>">OPD</a>
                                    </li>
                                    <li>
                                          <a href="<?php echo e(url('/kabupaten')); ?>">Kabupaten</a>
                                    </li>

                                    <li>
                                          <a href="<?php echo e(url('/users')); ?>">User</a>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>


                        </ul>
                    </li>



            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">Biro ADM Perekonomian & SDA</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">

        </section>

    <section class="content">
        <div class="container-fluid">
          <?php if(Request::is('/')): ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

             <?php echo $__env->yieldContent('content'); ?>


          <?php else: ?>


            <!-- Widgets -->
            <div class="row clearfix">

                  <!-- widget -->


            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <h3> <?php if(Request::is('data/bidang/3')): ?> Informasi Data Potensi Energi & Sumber Daya Mineral <?php else: ?> <?php echo e($title); ?>  <?php endif; ?></h3>
                                </div>
                  <?php if(Request::is('data/bidang/3')): ?>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                       <div class="body">
                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                               <!-- Indicators -->
                               <ol class="carousel-indicators">
                                   <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                   <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                   <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                               </ol>

                               <!-- Wrapper for slides -->
                               <div class="carousel-inner" role="listbox">
                                   <div class="item active">
                                       <img src="<?php echo e(asset('images/sda/1.jpg')); ?>" />
                                   </div>
                                   <div class="item">
                                        <img src="<?php echo e(asset('images/sda/2.jpg')); ?>" />
                                   </div>
                                   <div class="item">
                                        <img src="<?php echo e(asset('images/sda/3.jpg')); ?>" />
                                   </div>
                               </div>

                               <!-- Controls -->
                               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                   <span class="sr-only">Previous</span>
                               </a>
                               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                   <span class="sr-only">Next</span>
                               </a>
                           </div>
                       </div>

               </div>
             <?php endif; ?>


                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body " style="min-height:500px"; >

                              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

                                   <?php echo $__env->yieldContent('content'); ?>





                        </div>
                    </div>
                </div>

            </div>
              <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo e(asset('template/plugins/jquery/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo e(asset('template/plugins/bootstrap/js/bootstrap.js')); ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/node-waves/waves.js')); ?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>

    <!-- Morris Plugin Js -->


    <!-- ChartJs -->
    <script src="<?php echo e(asset('template/plugins/chartjs/Chart.bundle.js')); ?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/flot-charts/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/jquery-sparkline/jquery.sparkline.js')); ?>"></script>


    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/bootstrap-notify/bootstrap-notify.js')); ?>"></script>


    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/sweetalert/sweetalert.min.js')); ?>"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')); ?>"></script>



    <!-- Custom Js -->
    <script src="<?php echo e(asset('template/js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/pages/ui/dialogs.js')); ?>"></script>

    <script src="<?php echo e(asset('template/js/pages/tables/jquery-datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/pages/ui/tooltips-popovers.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/pages/forms/form-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('template/js/pages/forms/basic-form-elements.js')); ?>"></script>

    <!-- Jquery Core Js -->
    <script src="<?php echo e(asset('template/js/confirm.js')); ?>"></script>



    <!-- Demo Js -->
    <script src="<?php echo e(asset('template/js/demo.js')); ?>"></script>


</body>

</html>
