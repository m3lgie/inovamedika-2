<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Aplication | Point of Sale</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('template/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->

    <link href="{{asset('template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('template/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="{{asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{asset('template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{asset('template/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{asset('template/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />


    <!-- Sweetalert Css -->
    <link href="{{asset('template/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />

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
                <a class="navbar-brand" href="{{ url('/') }}">   Aplication | Point of Sale</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>

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
                @if(!Auth::check())

                    <div  class="col-sm-9 m-t-10">


                  
                    </div>
                @else
                    <div class="image">
                        <img src="@if (Auth::user()->gambar!='') {{asset('/'.Auth::user()->gambar)}} @else {{asset('images/user.png')}}  @endif " width="48" height="48" alt="User" />
                    </div>
                      <div class="info-container">
                          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                          <div class="email">{{Auth::user()->email}}</div>
                          <div class="btn-group user-helper-dropdown">
                              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                              <ul class="dropdown-menu pull-right">

                                  <li><a href="{{ url('/profile/'.Auth::user()->id) }}"><i class="material-icons">person</i>Profile</a></li>

                                  <li role="seperator" class="divider"></li>
                                  <li><a href="javascript:void(0);">
                                  <li><a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Sign Out</a>
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                                  </li>
                              </ul>
                          </div>
                      </div>
                @endif

            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                 <ul class="list">
                     <li class="header">MAIN NAVIGATION</li>
                     <li class="active">
                         <a href="{{ url('/') }}">
                             <i class="material-icons">home</i>
                             <span>Home</span>
                         </a>
                     </li>
                      @if(Auth::check() and (Auth::user()->level==0 or Auth::user()->level==1))
                     <li>
                         <a href="javascript:void(0);" class="menu-toggle">
                             <i class="material-icons">assessment</i>
                             <span>Master Table</span>
                         </a>
                         <ul class="ml-menu">
                           <li>
                               <a href="{{ url('/products') }}">Products</a>
                           </li>
                           <li>
                               <a href="{{ url('/product_unit') }}">Products Unit</a>
                           </li>


                         </ul>
                     </li>
                     @endif



                         <li>
                             <a href="javascript:void(0);" class="menu-toggle">
                                 <i class="material-icons">account_balance</i>
                                 <span>Transaction</span>
                             </a>
                             <ul class="ml-menu">


                                   <li>
                                       <a href="{{ url('/transactions')  }}">Transactions</a>
                                   </li>

                                    <li>
                                        <a href="{{URL::route('transactions.create')}}">Add Transactions</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::route('report')}}">Report</a>
                                    </li>


                             </ul>
                         </li>






                     <li>
                         <a href="javascript:void(0);" class="menu-toggle">
                             <i class="material-icons">lock</i>
                             <span>Admin Area</span>
                         </a>
                         <ul class="ml-menu">
                             @if(!Auth::check())
                             <li>

                                   <a href="{{ url('/login') }}">
                                       <i class="material-icons">person</i>
                                       <span>Sign In</span>
                                   </a>
                             </li>
                             @endif

                              @if(Auth::check() and Auth::user()->level==0)
                             <li>
                                 <a href="javascript:void(0);" class="menu-toggle">
                                     <i class="material-icons">assignment</i>
                                     <span>Data Master</span>
                                 </a>
                                 <ul class="ml-menu">

                                     <li>
                                           <a href="{{ url('/users') }}">User</a>
                                     </li>

                                 </ul>
                             </li>
                             @endif


                         </ul>
                     </li>



             </div>

            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">Melgisaputra Dwi Nanda</a>.
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
          @if (Request::is('/'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>

             @yield('content')


          @else


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
                                    <h3> {{$title}}  </h3>
                                </div>


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

                                   @yield('content')





                        </div>
                    </div>
                </div>

            </div>
              @endif

            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('template/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('template/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('template/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->


    <!-- ChartJs -->
    <script src="{{asset('template/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('template/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>


    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{asset('template/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>


    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('template/plugins/sweetalert/sweetalert.min.js')}}"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{asset('template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>



    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js')}}"></script>
    <script src="{{asset('template/js/pages/ui/dialogs.js')}}"></script>

    <script src="{{asset('template/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('template/js/pages/ui/tooltips-popovers.js')}}"></script>
    <script src="{{asset('template/js/pages/forms/form-validation.js')}}"></script>
    <script src="{{asset('template/js/pages/forms/basic-form-elements.js')}}"></script>

    <!-- Jquery Core Js -->
    <script src="{{asset('template/js/confirm.js')}}"></script>



    <!-- Demo Js -->
    <script src="{{asset('template/js/demo.js')}}"></script>


</body>

</html>
