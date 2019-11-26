<?php $__env->startSection('content'); ?>



</style>
  <div id="line-example"></div>
  <script>
  Morris.Line({
  element: 'line-example',
  data: [
    { y: '2006', a: 100, b: 90 },
    { y: '2007', a: 75,  b: 65 },
    { y: '2008', a: 50,  b: 40 },
    { y: '2009', a: 75,  b: 65 },
    { y: '2010', a: 50,  b: 40 },
    { y: '2011', a: 75,  b: 65 },
    { y: '2012', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});
  </script>


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
                           <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo e($count_master); ?></div>
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
                           <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo e($count_view); ?></div>
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
                           <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo e($count_record); ?></div>
                       </div>
                   </div>
               </div>

           </div>

           <div class="row clearfix ">




                                              <?php $__currentLoopData = $tb_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data_tb_view): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <div class="row clearfix">
                                                                <div class="col-xs-12 col-sm-12">
                                                                      <a href="<?php echo e(url('/data/'.$data_tb_view->id)); ?>" > <h2><?php echo e($data_tb_view->nama); ?></h2></a>
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
                                                        <div class="body text-center myClass">




                                                      <?php if($data_tb_view->tipe_view==0): ?>

                                                          <?php 
                                                              $tahunmulai=Konversi::tahun($data_tb_view->id_tahun);
                                                              $tahunakhir=Konversi::tahun($data_tb_view->id_tahun);
                                                           ?>

                                                      <?php else: ?>
                                                          <?php 
                                                              $tahunmulai= date('Y')-4;
                                                              $tahunakhir= date('Y')
                                                           ?>


                                                      <?php endif; ?>

                                                     <?php if($data_tb_view->tipe_inputan==0): ?>
                                                       <script src="https://code.highcharts.com/highcharts.js"></script>
                                                       <script src="https://code.highcharts.com/modules/exporting.js"></script>

                                                       <div id="<?php echo e($data_tb_view->id); ?>" </div>
                                                       Keterangan : <?php echo e($data_tb_view->master_keterangan); ?><br>
                                                       <i>Sumber  <?php echo e($data_tb_view->sumber); ?></i>

                                                       <?php 
                                                       $i=1;
                                                       $kabupaten=array();
                                                       $totalfield=array();
                                                       $color=array('#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1');
                                                         $colorkabupaten=array();
                                                        ?>
                                                        <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                           <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                             <?php $__currentLoopData = $tb_detil_master->where('id_master','=',$data_tb_view->master); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                     <?php  $kabupaten[$x][$data_kabupaten->id][$detil_master->id]='0'  ?>
                                                                     <?php  $totalfield[$x][$detil_master->id]='0'  ?>
                                                                     <?php  $colorkabupaten[$data_kabupaten->id]=array_rand($color);  ?>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                       <?php endfor; ?>

                                                       <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                          <?php  $tahun= Konversi::idtahun($x)  ?>




                                                           <?php $__currentLoopData = $tb_record->where('id_master','=',$data_tb_view->master); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                                 <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                                             <?php if($record_detail->operation==0 and $record->id_tahun==$tahun): ?>
                                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]+=$record_detail->nilai  ?>

                                                                               <?php elseif($record_detail->operation==1 and $record->id_tahun==$tahun): ?>
                                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]+=1  ?>
                                                                               <?php else: ?>
                                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]="0"  ?>

                                                                               <?php endif; ?>



                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                                       <?php endfor; ?>



                                                       <script>
                                                       Highcharts.chart('<?php echo e($data_tb_view->id); ?>', {

                                                           chart: {
                                                               type: 'column'
                                                           },

                                                           title: {
                                                               text: '  <?php echo e($data_tb_view->nama); ?>'
                                                           },

                                                           xAxis: {
                                                               categories: [  <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>  '<?php echo e($x); ?>' <?php if($x < $tahunakhir): ?>, <?php endif; ?> <?php endfor; ?> ]
                                                               ,title: {
                                                                           text: "Tahun Laporan"

                                                                       }
                                                           },

                                                           yAxis: {
                                                               allowDecimals: false,
                                                               min: 0,
                                                               title: {
                                                                   text: 'Kabupaten'
                                                               }
                                                           },

                                                           tooltip: {
                                                               formatter: function () {
                                                                   return '<b>' + this.x + '</b><br/>' +
                                                                       this.series.name + ': ' + this.y + '<br/>' +
                                                                       'Total: ' + this.point.stackTotal;
                                                               }
                                                           },

                                                           plotOptions: {
                                                               column: {
                                                                   stacking: 'normal'
                                                               }
                                                           },
                                                           yAxis: {
                                                              stackLabels: {
                                                                  enabled: true,
                                                                  style: {
                                                                      fontWeight: 'bold',
                                                                      color: 'gray'
                                                                  },
                                                                  formatter: function() {
                                                                      return  this.stack;
                                                                  }
                                                              }
                                                          },legend: {

                                                              labelFormatter: function () {
                                                                  var label = this.name.split("-");
                                                                  return label[0];
                                                              }
                                                          },
                                                          hideHover: true,
                                                          series: [

                                                           <?php $__currentLoopData = $tb_detil_master->where('id_master','=',$data_tb_view->master); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                               <?php if($detil_master->id_master==$data_tb_view->master): ?>
                                                                         <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                           {
                                                                              <?php if($key==0): ?>
                                                                                      id: '<?php echo e($detil_master->id); ?>',
                                                                              <?php else: ?>
                                                                                      linkedTo: '<?php echo e($detil_master->id); ?>',
                                                                              <?php endif; ?>
                                                                              color : '<?php echo e($color[$colorkabupaten[$data_kabupaten->id]]); ?>',
                                                                              name: '<?php echo e($detil_master->nama); ?>-<?php echo e($data_kabupaten->kabupaten); ?>',
                                                                              data: [   <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                                                       <?php echo e($kabupaten[$x][$data_kabupaten->id][$detil_master->id]); ?>

                                                                                       <?php if($x < $tahunakhir): ?> , <?php endif; ?>
                                                                                   <?php endfor; ?>  ],
                                                                              stack: '<?php echo e($detil_master->nama); ?>'
                                                                           } <?php if($key < count($tb_kabupaten) - 1): ?> , <?php endif; ?>


                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                          <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                                   <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            ]



                                                        });
                                                       </script>

                                                     <?php else: ?>
                                                       <!--multiple !-->
                                                       <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
                                                       <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                                                      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



                                                       <?php 
                                                       $i=1;
                                                       $kabupaten=array();
                                                       $listnilai=array();
                                                       $totallist=array();
                                                        ?>

                                                       <!-- tipe view tahun laporan !-->
                                                       <?php if($data_tb_view->tipe_view==0): ?>

                                                             <h2 class="text-center"> Tahun Laporan <?php echo e($tahunmulai); ?> </h2>
                                                             <?php  $tahun= Konversi::idtahun($tahunmulai)  ?>



                                                                <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                   <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                     <?php if($data_list->id_list==$data_tb_view->id_list): ?>

                                                                         <?php 
                                                                               $listnilai[$data_kabupaten->id][$data_list->id]='0' ;
                                                                               $totallist[$data_kabupaten->id][0]=0;
                                                                          ?>

                                                                      <?php endif; ?>

                                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                                   <?php $__currentLoopData = $tb_record->where('id_master','=',$data_tb_view->master); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                                       <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                               <?php if($record->id_tahun==$tahun): ?>
                                                                                   <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                                                                   <?php  $listnilai[$record->id_kabupaten][$nilai[0]]+=$nilai[1]  ?>
                                                                                   <?php  $totallist[$record->id_kabupaten][0] +=$nilai[1] ; ?>
                                                                               <?php endif; ?>


                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>




                                                                  <div id="<?php echo e($data_tb_view->id); ?>" ></div>


                                                                          Keterangan : <?php echo e($data_tb_view->master_keterangan); ?><br>
                                                                          <i>Sumber  <?php echo e($data_tb_view->sumber); ?></i>


                                                             <?php  $color = array("#E91E63", "#9C27B0", "#673AB7", "#CDDC39", "#4CAF50", "#FF5722", "#795548", "#3F51B5", "#F44336");  ?>

                                                              <script src="<?php echo e(asset('template/plugins/morrisjs/morris-custom.js')); ?>"></script>
                                                             <script >


                                                                   // ID of the element in which to draw the chart.
                                                                   //position morris-custom

                                                                   new   Morris.Bar({

                                                                        element: '<?php echo e($data_tb_view->id); ?>',
                                                                       data: [
                                                                         <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                <?php if($data_list->id_list==$data_tb_view->id_list): ?>
                                                                                 {
                                                                                      'item': '<?php echo e($data_list->nama); ?>',
                                                                                      <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                       '<?php echo e($data_kabupaten->kabupaten); ?>': <?php echo e($listnilai[$data_kabupaten->id][$data_list->id]); ?> <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                                                  } <?php if($key < count($list)-1 ): ?> , <?php endif; ?>
                                                                                <?php endif; ?>
                                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> ],
                                                                       xkey: 'item',
                                                                       ykeys: [   <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                           '<?php echo e($data_kabupaten->kabupaten); ?>' <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                              ],
                                                                       labels: [   <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                           '<?php echo e($data_kabupaten->kabupaten); ?>' <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> ,<?php endif; ?>
                                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                ],
                                                                       horizontal: true,
                                                                        resize: true,
                                                                       stacked: true,
                                                                       hideHover: true
                                                                     });

                                                             </script>


                                                       <!-- tipe view 5 tahunan !-->
                                                       <?php else: ?>

                                                         <?php 
                                                         $i=1;
                                                         $listnilai=array();
                                                         $totallist=array();
                                                          ?>

                                                         <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                               <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                  <?php if($data_list->id_list==$data_tb_view->id_list): ?>
                                                                     <?php 
                                                                           $listnilai[$x][$data_list->id]='0' ;
                                                                           $totallist[$x]=0;
                                                                      ?>
                                                                   <?php endif; ?>
                                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                         <?php endfor; ?>


                                                         <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                             <?php  $tahun= Konversi::idtahun($x)  ?>
                                                             <?php $__currentLoopData = $tb_record->where('id_master','=',$data_tb_view->master); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                 <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                        <?php if($record->id_tahun==$tahun ): ?>

                                                                             <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                                                             <?php  $listnilai[$x][$nilai[0]]+=$nilai[1]  ?>
                                                                             <?php  $totallist[$x] +=$nilai[1] ; ?>
                                                                         <?php endif; ?>


                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                         <?php endfor; ?>
                                                                  <h5 class="text-center"><?php echo e($data_tb_view->nama); ?></h5>
                                                                  <div id="<?php echo e($data_tb_view->id); ?>"  class="graph"></div>
                                                                  Keterangan : <?php echo e($data_tb_view->master_keterangan); ?><br>
                                                                  <i>Sumber  <?php echo e($data_tb_view->sumber); ?></i>



                                                                   <script >



                                                                                                 new  Morris.Bar({
                                                                                                  element: '<?php echo e($data_tb_view->id); ?>',
                                                                                                  data: [

                                                                                                    <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>

                                                                                                           {
                                                                                                                'periode': '<?php echo e($x); ?>',
                                                                                                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                                                      <?php if($data_list->id_list==$data_tb_view->id_list): ?>

                                                                                                                        '<?php echo e($data_list->nama); ?>': <?php echo e($listnilai[$x][$data_list->id]); ?> <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                                                                      <?php endif; ?>

                                                                                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                                            } <?php if($x <  $tahunakhir ): ?> , <?php endif; ?>
                                                                                                    <?php endfor; ?> ],
                                                                                                            xkey: 'periode',
                                                                                                            ykeys: [  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                                                          <?php if($data_list->id_list==$data_tb_view->id_list): ?>

                                                                                                                              '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                                                                          <?php endif; ?>
                                                                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                                                  ],
                                                                                                            labels: [ <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                                                          <?php if($data_list->id_list==$data_tb_view->id_list): ?>

                                                                                                                            '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                                                                          <?php endif; ?>
                                                                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                                                  ],
                                                                                                            stacked: true,
                                                                                                            hideHover: true
                                                                                                });

                                                                   </script>



                                                       <?php endif; ?>







                                                 <?php endif; ?>





                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                            </div>




                       <div class="row clearfix">
                         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       <div class="card">
           <div class="header">
               <h2>Kontribusi Kabupaten</h2>
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
                 <table class="table table-hover dashboard-task-infos">
                    <thead>
                           <tr>
                               <th>#</th>
                               <th>Kabupaten</th>
                               <th>Status</th>
                               <th>Record</th>
                               <th>Kontribusi</th>
                           </tr>
                       </thead>
                       <tbody>
                         <?php  $i=1; ?>
                         <?php $__currentLoopData = $tb_record_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                           <tr>
                               <td><?php echo e($i); ?></td>
                               <td><?php echo e($kabupaten->kabupaten); ?></td>
                               <td><?php echo Konversi::kontribusi_status($kabupaten->total/$count_record); ?></td>
                               <td><?php echo e($kabupaten->total); ?> record</td>
                               <td>
                                   <div class="progress" data-toggle="tooltip" data-placement="top" title="<?php echo e(number_format($kabupaten->total/$count_record,2)*100); ?>%">
                                       <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo e($kabupaten->total); ?>" aria-valuemin="0" aria-valuemax="<?php echo e($count_record); ?>" style="width: <?php echo e($kabupaten->total/$count_record*100); ?>%"></div>
                                   </div>
                               </td>
                           </tr>
                              <?php  $i++; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                       </tbody>
                   </table>
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
                                                     <?php $__currentLoopData = $tb_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <li>
                                                           <?php echo e($tahun->tahun); ?>

                                                           <span class="pull-right">
                                                               <i class="material-icons">trending_up</i>
                                                           </span>
                                                       </li>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>