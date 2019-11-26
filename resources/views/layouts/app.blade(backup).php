@foreach ($setting as $key => $setting)
   {{Session::set($setting->tipe, $setting->content_setting)}}
@endforeach

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ Session::get('site_title') }}</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="{{asset('admin/images/logo.png')}}" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css') }}" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/animate.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/nexus.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ticker.css') }}">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
      		<button class="close" type="button" data-dismiss="modal">×</button>
      		<h3 class="modal-title">Heading</h3>
      	</div>
      	<div class="modal-body">

      	</div>

         </div>
        </div>
      </div>

        <div id="body-bg " class="animate fadeIn">
            <!-- Phone/Email -->
            <div id="pre-header" class="background-gray-lighter ">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-8 padding-vert-5">
                          Selamat Datang di Website {{ Session::get('site_title') }}
                        </div>
                        <div class="col-sm-4 text-right padding-vert-5">

                          <strong>Email:</strong>&nbsp;{{ Session::get('site_email') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header">
                <div class="header-container">
                    <div class="">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}" title="">
                                @foreach ($header as $key => $header)
                                    <img style="max-width:1200px;" src="{{ asset($header->gambar) }}" alt="Logo" />
                                @endforeach

                            </a>

                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="">
                <div class="container no-padding border-bottom">
                    <div class="row">
                        <div class="col-md-8 no-padding">
                            <div class="visible-lg">
                                <ul id="hornavmenu" class="nav navbar-nav">

                                    <li>
                                        <a href="{{ url('/') }}" class="active">Home</a>
                                    </li>
                                    @foreach ($menu as $index => $menuRoot)


                                      @if ($menuRoot->id_parent==0 and $menuRoot->posisi==0 )
                                          <li>
                                              <a href="{{ url($menuRoot->url) }}" >{{$menuRoot->menu}}</a>


                                                      @foreach ($menu as $indexSub => $menuSub)

                                                          @if ($indexSub==0)
                                                              <ul>
                                                          @endif


                                                                  @if ($menuRoot->id==$menuSub->id_parent and $menuSub->posisi==0)
                                                                      <li>
                                                                          <a href="{{ url($menuSub->url) }}" >{{$menuSub->menu}}</a>
                                                                      </li>
                                                                  @endif


                                                        @if ($indexSub==count($menu)-1)
                                                            </ul>
                                                        @endif
                                                      @endforeach



                                        </li>
                                        @endif

                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <ul class="social-icons pull-right">
                                <li class="social-rss">
                                    <a href="#" target="_blank" title="RSS"></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#" target="_blank" title="Twitter"></a>
                                </li>
                                <li class="social-facebook">
                                    <a href="#" target="_blank" title="Facebook"></a>
                                </li>
                                <li class="social-googleplus">
                                    <a href="#" target="_blank" title="Google+"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            @if (Request::is('/'))
            <div id="slideshow" class="">

                <div class="container no-padding background-white bottom-border">



                    <div class="row">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
                @foreach( $gallerySlide as $index => $galleryList  )
                  <li data-target="#myCarousel" data-slide-to="{{$index}}" class="@if($index==0) active @endif"></li>
               @endforeach
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
                @foreach( $gallerySlide as $index => $gallerySlide  )

    							<div class="item @if($index==0) active @endif">
    							  <img style="height: 300px;" class="img-responsive center-block" src="{{ asset($gallerySlide->gambar) }}">
    							  <div class="carousel-caption">
    								<h3 style="color:#FFFFFF">{{ $gallerySlide->judul }}</h3>
    								<p>{{ $gallerySlide->keterangan }}</p>
    							  </div>
    							</div>
             @endforeach

						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
					</div>

                        <!-- End Carousel Slideshow -->
                    </div>
                </div>
            </div>

         @endif

			 <div id="" class="">
           @if (Request::is('/'))
                <div class="container no-padding running-text bottom-border">

                    <div class="row">
                      <div class="ticker-container">
                        <div class="ticker-caption">
                          <p>Breaking News</p>
                        </div>
                        <ul>
                          @foreach ($posting as $index => $breakingnews)
                               @if ($index<4)
                                <div>
                                  <li><span>{{$breakingnews->judul}} &ndash;
                                    <a href="{{URL::route('media.show', array($breakingnews->id))}}" data-toggle="tooltip" data-placement="top" title="Read More" >
                                         Read More
                                    </a></span></li>
                                </div>
                              @endif
                          @endforeach

                        </ul>
                      </div>

                </div>
            </div>
          @endif

            <div id="content" class="">
                <div class="container background-white bottom-border ">

                    <div class="row margin-vert-30">



						  <!-- Postingan -->
						<div class="col-md-9 ">

                                    <!-- Primary Panel -->

            <div class="border-bottom">
              <div class="panel-heading background-panel animate fadeInLeft ">
                      <h3 class="panel-title animate fadeInUp">Info Dinas</h3>
             </div>

           <div class="panel-body animate fadeIn">
											<div class="col-md-8 ">

											</div>
											<div class="col-md-4 ">

											</div>


                        @yield('content')



                        <!-- Blog Post -->



					<!-- End Pagination -->
                      <!-- Tab Heading
												<div class="row tabs">
                                <div class="col-sm-3">
                                    <ul class="nav nav-stacked">
                                        <li class="active">
                                            <a href="#sample-3a" data-toggle="tab">
                                                <i class="fa fa-home"></i> Sample Heading 1 sdadasd asad asd asda sdasd </a>
                                        </li>
                                        <li>
                                            <a href="#sample-3b" data-toggle="tab">
                                                <i class="fa fa-cloud"></i> Sample Headin asdasdas das dasdasdas dsadg 2</a>
                                        </li>
                                        <li>
                                            <a href="#sample-3c" data-toggle="tab">
                                                <i class="fa fa-comments"></i> Sample Hedasd asdasd asdasdasda sadasdasdas dasdasading 3</a>
                                        </li>
                                        <li>
                                            <a href="#sample-3d" data-toggle="tab">
                                                <i class="fa fa-gear"></i> Sample Headi asdasdas dasdng 4</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="sample-3a">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="assets/img/fillers/filler2.jpg" alt="filler image">
                                                </div>
                                                <div class="col-md-7">
                                                    <h3 class="no-margin no-padding">Humanitatis Per Seacula</h3>
                                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus,
                                                        qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothicas.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in" id="sample-3b">
                                            <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus,
                                                qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
                                                Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                                        </div>
                                        <div class="tab-pane fade in" id="sample-3c">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="assets/img/fillers/filler3.jpg" alt="filler image">
                                                </div>
                                                <div class="col-md-7">
                                                    <h3 class="no-margin no-padding">Mirum Est Notare</h3>
                                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus,
                                                        qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothicas.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in" id="sample-3d">
                                            <p>Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, Vivamus imperdiet condimentum diam, eget placerat felis consectetur id. Donec eget orci metus, ac adipiscing nunc.
                                                Pellentesque fermentum, ante ac interdum ullamcorper. Donec eget orci metus, ac adipiscing nunc. Pellentesque fermentum, consectetur id.</p>
                                            <ul>
                                                <li>Donec eget orci metus</li>
                                                <li>Ante ac interdum ullamcorper</li>
                                                <li>Vivamus imperdiet condimentum</li>
                                                <li>Pellentesque fermentum</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                                        </div>
                                    </div>
                                    <!-- End Primary Panel -->
                        </div>


                        <div class="col-md-3 animate fadeInUp">
                            <!-- Primary Panel -->

                            <div class="border-bottom">
                                <div class="panel-heading background-panel">
                                    <h3 class="panel-title animate fadeInUp">Kepala Dinas</h3>
                                </div>
                                <div style="text-align: justify;" class="panel-body animate fadeInLeft ">

                                        <img style="max-width: 100px; margin-right:10px; margin-bottom:10px; text-align: justify;" class="img-responsive pull-left"  src="{{ asset('admin/images/gallery/'.Session::get('site_kepala_dinas')) }}">

                                          {{ Session::get('site_sambutan') }}
                                </div>
                            </div>

                            <div class="border-bottom">
                                <div class="panel-heading background-panel">
                                    <h3 class="panel-title animate fadeInUp">Pengumuman</h3>
                                </div>
                                <div class="panel-body animate fadeInLeft ">
                                  <ul>
                                    @foreach ($pengumuman as $index => $pengumuman)
                                        @if ($pengumuman->kategori==2)
                                          <li> <a href="{{URL::route('media.show', array($pengumuman->id))}}"data-toggle="tooltip" data-placement="top" title="" >{{$pengumuman->judul}}</a>
                                                <br> <span class="glyphicon glyphicon-time"></span> {{ substr(Tanggal::tgl_indo($pengumuman->created_at),0,16) }}
                                          </li>
                                        @endif

                                    @endforeach

                                  </ul>
                                </div>
                            </div>

                            <div class="border-bottom">
                                <div class="panel-heading background-panel">
                                    <h3 class="panel-title animate fadeInUp">Berita</h3>
                                </div>
                                <div class="panel-body animate fadeInLeft ">


                                  @foreach ($berita as $index => $berita)

                                         <div class="no-padding col-md-4">

                                           <img style="min-width: 50px; margin-right:10px;" class="img-responsive center-block" src="{{ asset($berita->gambar) }}">

                                         </div>
                                         <div class="col-md-8">


                                                <h5> <a href="{{URL::route('media.show', array($berita->id))}}" data-toggle="tooltip" data-placement="top" title="" >{{$berita->judul}}</a>
                                                <small><br> {{$berita->created_at}} <hr></small></h5>
                                         </div>


                                  @endforeach


                                </div>
                            </div>

                            <div class="border-bottom">
                                <div class="panel-heading background-panel">
                                    <h3 class="panel-title animate fadeInUp">Agenda</h3>
                                </div>
                                <div class="panel-body animate fadeInLeft ">
                                  <ul>
                                    @foreach ($agenda as $index => $agenda)

                                          <li> <a href="{{URL::route('media.show', array($agenda->id))}}"data-toggle="tooltip" data-placement="top" title="" >{{$agenda->judul}}</a>
                                                <br> <span class="glyphicon glyphicon-time"></span> {{ substr(Tanggal::tgl_indo($agenda->created_at),0,16) }}
                                          </li>
                                    @endforeach

                                  </ul>
                                <ul>

                                </ul>
                              </div>
                            </div>

                            <div class="border-bottom">
                                <div class="panel-heading background-panel">
                                    <h3 class="panel-title animate fadeInUp">Link Terkait</h3>
                                </div>
                                <div class="panel-body animate fadeInLeft ">
                                  @foreach ($link as $index => $link)

                                          <a href="{{'go/'.$link->id}}"data-toggle="tooltip" data-placement="top" title="{{$link->link}}" >
                                                  <img src="{{ asset($link->gambar) }}" class="img-responsive center-block">
                                              </a>
                                             <h5  align='center'> <small>{{ $link->judul }} </small></h5>



                                  @endforeach
                                </div>
                            </div>
                            <!-- End Primary Panel -->
                        </div>


              <!-- Bidang Panel -->

              <!-- End Bidang Panel -->
                    </div>
                </div>
            </div>
            <!-- Gallery Panel -->

             @include('client/gallery')
            <!-- End Gallery Panel -->
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                <div class="container bottom-border padding-vert-30">
                    <div class="row">
                        <!-- Disclaimer -->
                        <div class="col-md-4">
                          <div style="height: 300px; width: 300px;">
                            {!! Mapper::render () !!}
                          </div>

                        </div>
                        <!-- End Disclaimer -->
                        <!-- Contact Details -->
                        <div class="col-md-4 margin-bottom-20">
                            <h3 class="margin-bottom-10">Contact Details</h3>
                            <p>
                                {{ Session::get('site_alamat') }}
                                <br>
                                <span class="fa-phone">Phone:</span>{{ Session::get('site_telpon') }}
                                <br>
                                <span class="fa-phone">Hp:</span>{{ Session::get('site_hp') }}
                                <br>
                                <span class="fa-envelope">Email:</span>
                                <a href="{{ Session::get('site_email') }}">{{ Session::get('site_email') }}</a>
                                <br>
                                <span class="fa-link">Website:</span>
                                <a href="{{ Session::get('website') }}">{{ Session::get('site_website') }}</a>
                            </p>
                            <p>{{ Session::get('site_quotes') }}</p>
                        </div>
                        <!-- End Contact Details -->
                        <!-- Sample Menu -->
                        <div class="col-md-4 margin-bottom-20">
                            <h3 class="margin-bottom-10">Sample Menu</h3>
                            <ul class="menu">
                                <li>
                                    <a class="fa-tasks" href="#">Placerat facer possim</a>
                                </li>
                                <li>
                                    <a class="fa-users" href="#">Quam nunc putamus</a>
                                </li>
                                <li>
                                    <a class="fa-signal" href="#">Velit esse molestie</a>
                                </li>
                                <li>
                                    <a class="fa-coffee" href="#">Nam liber tempor</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End Sample Menu -->
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div id="footer" class="background-grey">
                <div class="container">
                    <div class="row">
                        <!-- Footer Menu -->
                        <div id="footermenu" class="col-md-6">
                            <ul class="list-unstyled list-inline">
                              @foreach ($menu as $index => $menuFooter)
                                  @if ($menuFooter->posisi==1 )
                                    <li>
                                        <a href="{{ url($menuFooter->url) }}" >{{$menuFooter->menu}}</a>
                                      </li>
                                  @endif
                                @endforeach


                            </ul>
                        </div>
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id="copyright" class="col-md-6">
                            <p class="pull-right">{!! Session::get('site_footer') !!}</p>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </div>

            <!-- End Footer -->
            <!-- JS -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
            <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <script type="text/javascript" src="{{asset('assets/js/scripts.js') }}"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.isotope.js') }}" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.slicknav.js') }}" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="{{asset('assets/js/jquery.visible.js') }}" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="{{asset('assets/js/jquery.sticky.js') }}" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="{{asset('assets/js/slimbox2.js') }}" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="{{asset('assets/js/modernizr.custom.js') }}" type="text/javascript"></script>
            <!--ticker-->

            <script src="{{asset('assets/js/ticker.js') }}"></script>
            <script type="text/javascript">

              var _gaq = _gaq || [];
              _gaq.push(['_setAccount', 'UA-36251023-1']);
              _gaq.push(['_setDomainName', 'jqueryscript.net']);
              _gaq.push(['_trackPageview']);

              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();

            </script>

            <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
            <script type="text/javascript" src="js/bootstrap-upload.js" charset="UTF-8"></script>
            <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>


            <script src="{{asset('js/jquery.dataTables.min.js') }}"></script>
            <script src="{{asset('js/datatables.js') }}"></script>

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


            <script type="text/javascript">
          $(document).ready(function() {
          $('.thumbnail').click(function(){
             $("#modal-content").scrollTop(0);
                $('.modal-body').empty();
            	var title = $(this).parent('a').attr("title");
            	$('.modal-title').html(title);
            	$($(this).parents('div').html()).appendTo('.modal-body');
            	$('#myModal').modal({show:true});

          });
          });
            </script>


            <script type="text/javascript">

          $(function() {

              //here you have the control over the body of the iframe document
              var iBody = $("#iView").contents().find("mapdiv");


              //here you have the control over any element (#myContent)
              var myContent = iBody.find("#myContent");

          });

            </script>



            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->
