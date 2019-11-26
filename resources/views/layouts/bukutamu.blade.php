<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" media="all">



        <!-- GOOGLE FONTS-->
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/bootstrap-upload.css') }}" rel="stylesheet" media="screen">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" >

    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" >

	<script src="{{ asset('js/jquery.min.js') }}  "></script>
<script src="{{ asset('js/bootstrap.min.js') }} "></script>
 <script src="{{ asset('templateEditor/ckeditor/ckeditor.js') }} "></script>


</head>
<body>
    <div id="app">
      <!-- Static navbar -->
     <nav class="navbar navbar-default">
       <div class="container-fluid">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">Project name</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
             <li class="active"><a href="#">Home</a></li>
             <li><a href={{url('/berita')}}>Berita</a></li>
             <li><a href="#">Contact</a></li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
               <ul class="dropdown-menu">
                 <li><a href="#">Action</a></li>
                 <li><a href="#">Another action</a></li>
                 <li><a href="#">Something else here</a></li>
                 <li role="separator" class="divider"></li>
                 <li class="dropdown-header">Nav header</li>
                 <li><a href="#">Separated link</a></li>
                 <li><a href="#">One more separated link</a></li>
               </ul>
             </li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
             <li><a href="../navbar-static-top/">Static top</a></li>
             <li><a href="../navbar-fixed-top/">Fixed top</a></li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
               <!-- Authentication Links -->
               @if (Auth::guest())
                   <li><a href="{{ url('/login') }}">Login</a></li>
                   <li><a href="{{ url('/register') }}">Register</a></li>
               @else
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <ul class="dropdown-menu" role="menu">
                           <li>
                               <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                   Logout
                               </a>

                               <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </li>
                       </ul>
                   </li>
               @endif
           </ul>
         </div><!--/.nav-collapse -->
       </div><!--/.container-fluid -->
     </nav>


        @yield('content')
    </div>

    <!-- Scripts -->

    <!-- Placed at the end of the document so the pages load faster -->



    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap-upload.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>


    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/datatables.js"></script>

    <script type="text/javascript">

		$(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_four_button"
			});

			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Pencarian Singkat');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
			});
		});
		</script>
</body>
</html>
