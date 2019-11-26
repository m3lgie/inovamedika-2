@extends('layouts.app')
@section('content')



  <div class="block-header">
               <h2>DASHBOARD</h2>
           </div>

           <!-- Widgets -->
           <div class="row clearfix">
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <div class="info-box bg-pink hover-expand-effect">
                       <div class="icon">
                           <i class="material-icons">playlist_add_check</i>
                       </div>
                       <div class="content">
                           <div class="text">Tabel Data</div>
                           <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">99</div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <div class="info-box bg-cyan hover-expand-effect">
                       <div class="icon">
                           <i class="material-icons">help</i>
                       </div>
                       <div class="content">
                           <div class="text">View Data</div>
                           <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">99</div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                   <div class="info-box bg-light-green hover-expand-effect">
                       <div class="icon">
                           <i class="material-icons">forum</i>
                       </div>
                       <div class="content">
                           <div class="text">Total Record</div>
                           <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">99</div>
                       </div>
                   </div>
               </div>

           </div>






                       <div class="row clearfix">
                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       <div class="card">
           <div class="header">
               <h2>Top Item</h2>
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
           <div class="body">
               <div class="table-responsive">

               </div>
           </div>
       </div>
   </div>

                                       <!-- #END# Visitors -->
                                       <!-- Latest Social Trends -->
                                       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                           <div class="card">
                                               <div class="body bg-cyan">
                                                   <div class="m-b--35 font-bold">Tahun Laporan</div>
                                                   <ul class="dashboard-stat-list">

                                                       <li>

                                                           <span class="pull-right">
                                                               <i class="material-icons">trending_up</i>
                                                           </span>
                                                       </li>


                                                   </ul>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- #END# Latest Social Trends -->
                                       <!-- Answered Tickets -->


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

  </div>

  <script>
  $('#myCarousel').on('slid.bs.carousel', function (e) {
	var chart= $(this).find('.item.active .chart');
	var id = chart.attr('id');
  if(chart.hasClass('loaded')){
    console.log(id+' - loaded');
  	return true;
    alert(id);
  }});
  </script>
@endsection
