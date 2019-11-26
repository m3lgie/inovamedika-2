<?php $__env->startSection('content'); ?>
<div class="myClass">


      <div class="container-fluid">


      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>




        <h4>  Data Bidang <?php echo e(Konversi::listing($master->id_bidang)); ?></h4>
        <?php if($tb_view->tipe_view==0): ?>

            <?php 
                $tahunmulai=Konversi::tahun($tb_view->id_tahun);
                $tahunakhir=Konversi::tahun($tb_view->id_tahun);
             ?>

        <?php else: ?>
            <?php 
                $tahunmulai= date('Y')-4;
                $tahunakhir= date('Y')
             ?>


        <?php endif; ?>

        <?php if($master->tipe_inputan==0): ?>

                                     <script src="https://code.highcharts.com/highcharts.js"></script>
                                     <script src="https://code.highcharts.com/modules/exporting.js"></script>

                                     <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>




                                     <?php 
                                     $i=1;
                                     $kabupaten=array();
                                     $totalfield=array();
                                     $color=array('#7cb5ec', '#434348', '#90ed7d', '#f7a35c', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1');
                                       $colorkabupaten=array();
                                      ?>
                                      <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                        <?php if($master->tipe=='0'): ?>
                                             <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                               <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       <?php  $kabupaten[$x][$data_kabupaten->id][$detil_master->id]='0'  ?>
                                                       <?php  $totalfield[$x][$detil_master->id]='0'  ?>
                                                       <?php  $colorkabupaten[$data_kabupaten->id]=array_rand($color);  ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                  <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                          <?php  $kabupaten[$x][$record->id][$detil_master->id]='0'  ?>
                                                          <?php  $totalfield[$x][$detil_master->id]='0'  ?>
                                                          <?php  $colorkabupaten[$record->id]=array_rand($color);  ?>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                     <?php endfor; ?>

                                     <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                        <?php  $tahun= Konversi::idtahun($x)  ?>



                                        <?php if($master->tipe=='0'): ?>

                                            <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                 <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                         <?php if($record->id_tahun==$tahun): ?>

                                                             <?php if($record_detail->operation==0): ?>
                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]+=$record_detail->nilai  ?>

                                                               <?php elseif($record_detail->operation==1): ?>
                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]+=1  ?>
                                                               <?php else: ?>
                                                                   <?php  $kabupaten[$x][$record->id_kabupaten][$record_detail->id_detil_master]=""  ?>

                                                               <?php endif; ?>
                                                         <?php endif; ?>


                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php else: ?>
                                          <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                               <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                       <?php if($record->id_tahun==$tahun): ?>

                                                           <?php if($record_detail->operation==0): ?>
                                                                 <?php  $kabupaten[$x][$record->id][$record_detail->id_detil_master]+=$record_detail->nilai  ?>

                                                             <?php elseif($record_detail->operation==1): ?>
                                                                 <?php  $kabupaten[$x][$record->id][$record_detail->id_detil_master]+=1  ?>
                                                             <?php else: ?>
                                                                 <?php  $kabupaten[$x][$record->id][$record_detail->id_detil_master]=""  ?>

                                                             <?php endif; ?>
                                                       <?php endif; ?>


                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>



                                     <?php endfor; ?>



                                     <script>

                                     Highcharts.chart('container', {

                                         chart: {
                                             type: 'column'
                                         },

                                         title: {
                                             text: '<?php echo e($title); ?>'
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

                                         <?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                    <?php if($master->tipe==0): ?>
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

                                                    <?php else: ?>
                                                            <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                {
                                                                   <?php if($key==0): ?>
                                                                           id: '<?php echo e($detil_master->id); ?>',
                                                                   <?php else: ?>
                                                                           linkedTo: '<?php echo e($detil_master->id); ?>',
                                                                   <?php endif; ?>
                                                                   color : '<?php echo e($color[$colorkabupaten[$record->id]]); ?>',
                                                                   name: '<?php echo e($detil_master->nama); ?>-<?php echo e($record->id); ?>',
                                                                   data: [   <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                                                            <?php echo e($kabupaten[$x][$record->id][$detil_master->id]); ?>

                                                                            <?php if($x < $tahunakhir): ?> , <?php endif; ?>
                                                                        <?php endfor; ?>  ],
                                                                   stack: '<?php echo e($detil_master->nama); ?>'
                                                                } <?php if($key < count($tb_record) - 1): ?> , <?php endif; ?>

                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php endif; ?>

                                                <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                          ]



                                      });
                                     </script>



              <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                 <p>
                 <?php  $tahun= Konversi::idtahun($x)  ?>
                 <h3> Data Tahun <?php echo e($x); ?> </h3>

                 <ul class="nav nav-tabs" role="tablist">
                     <li role="presentation" class="active">
                         <a href="#home_<?php echo e(Konversi::idtahun($x)); ?>" data-toggle="tab">
                             <i class="material-icons">trending_up</i> Graph
                         </a>
                     </li>
                     <li role="presentation">
                         <a href="#profile_<?php echo e(Konversi::idtahun($x)); ?>" data-toggle="tab">
                             <i class="material-icons">list</i> Data
                         </a>
                     </li>

                 </ul>

                 <!-- Tab panes -->
                 <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active myClass" id="home_<?php echo e(Konversi::idtahun($x)); ?>">
                       <div id="<?php echo e(Konversi::idtahun($x)); ?>" class="graph"></div>

                     </div>
                     <div role="tabpanel" class="tab-pane fade myClass" id="profile_<?php echo e(Konversi::idtahun($x)); ?>">
                         <?php 
                         $i=1;
                         $kabupaten=array();
                         $totalfield=array();
                          ?>
                         <?php if($master->tipe=='0'): ?>

                                 <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                   <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <?php  $kabupaten[$data_kabupaten->id][$detil_master->id]='0'  ?>
                                           <?php  $totalfield[$detil_master->id]='0'  ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                         <?php else: ?>
                             <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                   <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <?php  $kabupaten[$record->id][$detil_master->id]='0'  ?>
                                           <?php  $totalfield[$detil_master->id]='0'  ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                         <?php endif; ?>



                         <?php if($master->tipe=='0'): ?>

                           <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                               <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                       <?php if($record->id_tahun==$tahun): ?>

                                           <?php if($record_detail->operation==0): ?>
                                                 <?php  $kabupaten[$record->id_kabupaten][$record_detail->id_detil_master]+=$record_detail->nilai  ?>

                                             <?php elseif($record_detail->operation==1): ?>
                                                 <?php  $kabupaten[$record->id_kabupaten][$record_detail->id_detil_master]+=1  ?>
                                             <?php else: ?>
                                                 <?php  $kabupaten[$record->id_kabupaten][$record_detail->id_detil_master]=""  ?>

                                             <?php endif; ?>
                                       <?php endif; ?>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php else: ?>

                              <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                      <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                              <?php if($record->id_tahun==$tahun): ?>

                                                  <?php if($record_detail->operation==0): ?>
                                                        <?php  $kabupaten[$record->id][$record_detail->id_detil_master]+=$record_detail->nilai  ?>

                                                    <?php elseif($record_detail->operation==1): ?>
                                                        <?php  $kabupaten[$record->id][$record_detail->id_detil_master]=$record_detail->nilai  ?>
                                                    <?php else: ?>
                                                        <?php  $kabupaten[$record->id][$record_detail->id_detil_master]=""  ?>

                                                    <?php endif; ?>
                                              <?php endif; ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                        <?php endif; ?>


                         <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                           <thead>
                               <tr>
                                 <th>No</th>
                                 <?php if($master->tipe=='0'): ?>      <th>Kabupaten</th> <?php endif; ?>

                                   <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <th><?php echo e($detil_master->nama); ?> (<?php echo e($detil_master->satuan); ?>)</th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                               </tr>
                           </thead>

                           <tbody>

                             <?php if($master->tipe=='0'): ?>
                                       <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                               <tr class="grade">
                                                   <td><?php echo e($i); ?></td>
                                                   <td><?php echo e($data_kabupaten->kabupaten); ?></td>
                                                 <!-- looping collomn !-->

                                                    <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                            <td><?php echo e(number_format($kabupaten[$data_kabupaten->id][$detil_master->id],2)); ?></td>
                                                              <?php  $totalfield[$detil_master->id]+=$kabupaten[$data_kabupaten->id][$detil_master->id]  ?>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                           </tr>
                                           <?php 
                                           $i++;
                                            ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                <?php else: ?>
                                          <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                  <tr class="grade">
                                                      <td><?php echo e($i); ?></td>

                                                    <!-- looping collomn !-->

                                                       <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                               <td><?php if($detil_master->tipe_value==0): ?>
                                                                        <?php echo e(number_format($kabupaten[$record->id][$detil_master->id],2)); ?>

                                                                         <?php  $totalfield[$detil_master->id]+=$kabupaten[$record->id][$detil_master->id]  ?>
                                                                  <?php else: ?>
                                                                        <?php echo e($kabupaten[$record->id][$detil_master->id]); ?>

                                                                         <?php  $totalfield[$detil_master->id]+=0  ?>
                                                                  <?php endif; ?></td>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                              </tr>
                                              <?php 
                                              $i++;
                                               ?>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>


                            <thead>
                                <tr>

                                  <th   <?php if($master->tipe=='0'): ?> colspan="2" <?php endif; ?> >Total</th>
                                    <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <th><?php if(!empty($totalfield)): ?><?php echo e(number_format( $totalfield[$detil_master->id],2)); ?> <?php else: ?> 0 <?php endif; ?></th>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                </tr>
                            </thead>
                           </tbody>
                        </table>
                     </div>

                 </div>



                           <script >
                           <?php if($master->tipe==0): ?>

                                   new Morris.Bar({
                                     // ID of the element in which to draw the chart.
                                     element: '<?php echo e(Konversi::idtahun($x)); ?>',
                                     // Chart data records -- each entry in this array corresponds to a point on
                                     // the chart.



                                    data: [

                                       <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                              {
                                                   'kabupaten': '<?php echo e($data_kabupaten->kabupaten); ?>',
                                                    <?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                           '<?php echo e($detil_master->id); ?>': <?php echo e($kabupaten[$data_kabupaten->id][$detil_master->id]); ?> <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                               } <?php if($key < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> ],
                                               xkey: 'kabupaten',
                                               ykeys: [ <?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       '<?php echo e($detil_master->id); ?>' <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                     ],
                                               labels: [<?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                       '<?php echo e($detil_master->nama); ?> (<?php echo e($detil_master->satuan); ?>)' <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                     ],
                                                     parseTime:false,
                                                     hideHover:true,
                                                     lineWidth:'6px',
                                                     xLabelAngle: 60,
                                                     xLabelMargin: 20,
                                                     stacked: true,
                                                     hideHover: true,
                                                  }).on('click', function(i, row){
                                                    console.log(row);





                                   });

                                <?php else: ?>


                                                                   new Morris.Bar({
                                                                     // ID of the element in which to draw the chart.
                                                                     element: '<?php echo e(Konversi::idtahun($x)); ?>',
                                                                     // Chart data records -- each entry in this array corresponds to a point on
                                                                     // the chart.



                                                                    data: [

                                                                       <?php $__currentLoopData = $tb_record->where('id_tahun','=',Konversi::idtahun($x)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                                                                              {
                                                                                   <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                      <?php if($key_detil_master==0): ?>
                                                                                          'kabupaten': '<?php echo e($kabupaten[$record->id][$detil_master->id]); ?>'

                                                                                      <?php endif; ?>
                                                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                   ,
                                                                                    <?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                           '<?php echo e($detil_master->id); ?>': <?php echo e($kabupaten[$record->id][$detil_master->id]); ?> <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                               } <?php if($key < count($tb_record)-1 ): ?> , <?php endif; ?>
                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> ],
                                                                               xkey: 'kabupaten',
                                                                               ykeys: [ <?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                       '<?php echo e($detil_master->id); ?>' <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                     ],
                                                                               labels: [<?php $__currentLoopData = $tb_detil_master->where('graph','=',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_detil_master=> $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                       '<?php echo e($detil_master->nama); ?> (<?php echo e($detil_master->satuan); ?>)' <?php if($key_detil_master < count($tb_detil_master) - 1): ?> , <?php endif; ?>
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                                     ],
                                                                                     parseTime:false,
                                                                                     hideHover:true,
                                                                                     lineWidth:'6px',
                                                                                     xLabelAngle: 60,
                                                                                     xLabelMargin: 20,
                                                                                     stacked: true,
                                                                                     hideHover: true,
                                                                                  }).on('click', function(i, row){
                                                                                    console.log(row);





                                                                   });



                                <?php endif; ?>

                           </script>



             <?php endfor; ?>


        <!-- tipe inputan from list !-->

        <?php else: ?>

              <?php 
              $i=1;
              $kabupaten=array();
              $listnilai=array();
              $totallist=array();
               ?>

              <!-- tipe view tahun laporan !-->
              <?php if($tb_view->tipe_view==0): ?>

                    <h3> Tahun Laporan <?php echo e($tahunmulai); ?> </h3>






                    <?php if($master->tipe=='0'): ?>

                          <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <?php 
                                        $listnilai[$data_kabupaten->id][$data_list->id]='0' ;
                                        $totallist[$data_kabupaten->id][0]=0;
                                   ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <?php else: ?>
                            <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                   <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                         <?php 

                                               $listnilai[Konversi::idtahun($tahunmulai)][$data_list->id]='0' ;
                                               $totallist[Konversi::idtahun($tahunmulai)]=0;
                                          ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>

                        <?php if($master->tipe=='0'): ?>

                          <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>


                              <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                          <?php  $listnilai[$record->id_kabupaten][$nilai[0]]+=$nilai[1]  ?>
                                          <?php  $totallist[$record->id_kabupaten][0] +=$nilai[1] ; ?>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                       <?php else: ?>
                         <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                           <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                     <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                       <?php  $listnilai[$record->id_tahun][$nilai[0]]+=$nilai[1]  ?>
                                       <?php  $totallist[$record->id_tahun] +=$nilai[1] ; ?>


                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                       <?php endif; ?>


                         <ul class="nav nav-tabs" role="tablist">
                             <li role="presentation" class="active">
                                 <a href="#home" data-toggle="tab">
                                     <i class="material-icons">trending_up</i> Graph
                                 </a>
                             </li>
                             <li role="presentation">
                                 <a href="#profile" data-toggle="tab">
                                     <i class="material-icons">list</i> Data
                                 </a>
                             </li>

                         </ul>

                         <!-- Tab panes -->
                         <div class="tab-content">
                             <div role="tabpanel" class="tab-pane fade in active" id="home">
                               <div id="<?php echo e($master->id); ?>" style=" height: 800px;" class="graph"></div>

                             </div>
                             <div role="tabpanel" class="tab-pane fade" id="profile">
                              <?php if($master->tipe=='0'): ?>
                                <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                <h3> Kabupaten <?php echo e(Konversi::kabupaten($data_kabupaten->id)); ?></h3>
                               <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                 <thead>
                                     <tr>
                                       <th>No</th>
                                       <th>Item</th>
                                       <th><?php echo e($tahunmulai); ?> ( <?php echo e($tb_detil_master[0]->satuan); ?> )</th>
                                       </tr>
                                 </thead>

                                 <tbody>

                                   <?php 
                                   $i=1;
                                    ?>
                                   <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                     <tr class="grade">
                                         <td><?php echo e($i); ?></td>
                                         <td><?php echo e($data_list->nama); ?></td>
                                         <td><?php echo e(number_format($listnilai[$data_kabupaten->id][$data_list->id],2)); ?></td>
                                       <!-- looping collomn !-->


                                 </tr>
                                 <?php 
                                 $i++;
                                  ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                 </tbody>
                                 <thead>
                                     <tr>
                                         <th colspan='2'>Total</th>
                                       <th><?php echo e(number_format($totallist[$data_kabupaten->id][0],2)); ?></th>
                                       </tr>
                                 </thead>
                              </table>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                              <?php else: ?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th><?php echo e($tahunmulai); ?> ( <?php echo e($tb_detil_master[0]->satuan); ?> )</th>
                                        </tr>
                                  </thead>

                                  <tbody>

                                    <?php 
                                    $i=1;
                                     ?>
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                      <tr class="grade">
                                          <td><?php echo e($i); ?></td>
                                          <td><?php echo e($data_list->nama); ?></td>
                                          <td><?php echo e(number_format($listnilai[Konversi::idtahun($tahunmulai)][$data_list->id],2)); ?></td>
                                        <!-- looping collomn !-->


                                  </tr>
                                  <?php 
                                  $i++;
                                   ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                                  </tbody>
                                  <thead>
                                      <tr>
                                          <th colspan='2'>Total</th>
                                        <th><?php echo e(number_format($totallist[Konversi::idtahun($tahunmulai)],2)); ?></th>
                                        </tr>
                                  </thead>
                               </table>
                              <?php endif; ?>

                             </div>
                        </div>


                    <?php  $color = array("#E91E63", "#9C27B0", "#673AB7", "#CDDC39", "#4CAF50", "#FF5722", "#795548", "#3F51B5", "#F44336");  ?>


                    <!--  new  Morris.Bar({
                                 element: '<?php echo e($master->id); ?>',
                                 data: [
                                   {x: '2011 Q1', y: 3, z: 2, a: 3},
                                   {x: '2011 Q2', y: 2, z: null, a: 1},
                                   {x: '2011 Q3', y: 0, z: 2, a: 4},
                                   {x: '2011 Q4', y: 2, z: 4, a: 3}
                                 ],
                                 xkey: 'x',
                                 ykeys: ['y', 'z', 'a'],
                                 labels: ['Y', 'Z', 'A'],
                                 stacked: true
                               }); !-->


    <script src="<?php echo e(asset('template/plugins/morrisjs/morris-custom.js')); ?>"></script>

                      <script >

                      <?php if($master->tipe=='0'): ?>
                            // ID of the element in which to draw the chart.
                            //position morris-custom


                            new   Morris.Bar({

                                  element: '<?php echo e($master->id); ?>',
                                data: [
                                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          {
                                               'item': '<?php echo e($data_list->nama); ?>',
                                               <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                '<?php echo e($data_kabupaten->kabupaten); ?>': <?php echo e($listnilai[$data_kabupaten->id][$data_list->id]); ?> <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                           } <?php if($key < count($list)-1 ): ?> , <?php endif; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> ],
                                xkey: 'item',
                                ykeys: [   <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    '<?php echo e($data_kabupaten->kabupaten); ?>' <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
],
                                labels: [   <?php $__currentLoopData = $tb_kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_kabupaten=> $data_kabupaten): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    '<?php echo e($data_kabupaten->kabupaten); ?>' <?php if($key_kabupaten < count($tb_kabupaten)-1 ): ?> , <?php endif; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
],
                                horizontal: true,
                                stacked: false,
                                hideHover: true
                              });

                              <?php else: ?>
                              new   Morris.Bar({

                                    element: '<?php echo e($master->id); ?>',
                                  data: [
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            {
                                                 'item': '<?php echo e($data_list->nama); ?>',

                                                 'nilai': <?php echo e($listnilai[Konversi::idtahun($tahunmulai)][$data_list->id]); ?>




                                             } <?php if($key < count($list)-1 ): ?> , <?php endif; ?>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> ],
                                  xkey: 'item',
                                  ykeys: [  'nilai'         ],
                                  labels: [   'nilai'       ],
                                  horizontal: false,
                                  stacked: false,
                                  hideHover: true
                                });
                              <?php endif; ?>

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
                                  <?php 
                                        $listnilai[$x][$data_list->id]='0' ;
                                        $totallist[$x]=0;
                                   ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      <?php endfor; ?>


                      <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                          <?php  $tahun= Konversi::idtahun($x)  ?>
                          <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                              <?php $__currentLoopData = $tb_record_detail->where('id_record','=',$record->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                      <?php if($record->id_tahun==$tahun): ?>
                                          <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                          <?php  $listnilai[$x][$nilai[0]]+=$nilai[1]  ?>
                                          <?php  $totallist[$x] +=$nilai[1] ; ?>
                                      <?php endif; ?>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      <?php endfor; ?>

                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active">
                              <a href="#home_<?php echo e(Konversi::idtahun($x)); ?>" data-toggle="tab">
                                  <i class="material-icons">trending_up</i> Graph
                              </a>
                          </li>
                          <li role="presentation">
                              <a href="#profile_<?php echo e(Konversi::idtahun($x)); ?>" data-toggle="tab">
                                  <i class="material-icons">list</i> Data
                              </a>
                          </li>

                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="home_<?php echo e(Konversi::idtahun($x)); ?>">
                            <div id="<?php echo e($master->id); ?>" style="height : 500px" class="graph"></div>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="profile_<?php echo e(Konversi::idtahun($x)); ?>">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">

                              <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                      <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                          <th><?php echo e($x); ?> ( <?php echo e($tb_detil_master[0]->satuan); ?> )</th>
                                          <?php if($x+1<=$tahunakhir ): ?>
                                              <th>growth (%)</th>
                                          <?php endif; ?>

                                      <?php endfor; ?>

                                    </tr>
                              </thead>

                              <tbody>

                                <?php 
                                $i=1;
                                 ?>
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                  <tr class="grade">
                                      <td><?php echo e($i); ?></td>
                                      <td><?php echo e($data_list->nama); ?></td>

                                      <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                        <td><?php echo e(number_format($listnilai[$x][$data_list->id],2)); ?></td>
                                            <?php if($x+1<=$tahunakhir ): ?>
                                                  <?php  $growth=($listnilai[$x+1][$data_list->id]-$listnilai[$x][$data_list->id]);    ?>
                                                  <!-- jika nilai tahun +1 tidak 0 !-->
                                                  <?php if($listnilai[$x+1][$data_list->id]!=0 ): ?>
                                                      <!-- jika nilai tahun tidak 0 !-->
                                                      <?php if($listnilai[$x][$data_list->id]!=0 ): ?>
                                                        <?php  $growth=$growth/$listnilai[$x][$data_list->id]* 100;  ?>

                                                      <?php else: ?>
                                                        <?php  $growth=$growth/1;  ?>

                                                      <?php endif; ?>

                                                  <?php else: ?>
                                                    <?php  $growth=$growth/1;  ?>
                                                  <?php endif; ?>
                                              <td><?php echo e(number_format( $growth ,2)); ?></td>


                                          <?php endif; ?>





                                      <?php endfor; ?>

                                    <!-- looping collomn !-->


                              </tr>
                              <?php 
                              $i++;
                               ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>



                              </tbody>
                              <thead>
                                  <tr>
                                    <th colspan='2'>Total</th>

                                    <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>
                                        <th><?php echo e(number_format($totallist[$x],2)); ?></th>
                                        <?php if($x+1<=$tahunakhir ): ?>
                                            <th></th>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    </tr>
                              </thead>
                           </table>
                          </div>

                      </div>





                                <script >
                                /*
                                new Morris.Line({
                                  // ID of the element in which to draw the chart.
                                  element: '<?php echo e($master->id); ?>',
                                  // Chart data records -- each entry in this array corresponds to a point on
                                  // the chart.
                                  data: [

                                    <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>

                                           {
                                                'periode': '<?php echo e($x); ?>',
                                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        '<?php echo e($data_list->nama); ?>': <?php echo e($listnilai[$x][$data_list->id]); ?> <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            } <?php if($x <  $tahunakhir ): ?> , <?php endif; ?>
                                    <?php endfor; ?> ],
                                            xkey: 'periode',
                                            ykeys: [  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                      '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                  ],
                                            labels: [ <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                      '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                  ],

                                                  hideHover:true,
                                                  lineWidth:'6px',
                                                  xLabelAngle: 60,
                                                  xLabelMargin: 20,
                                                  stacked: true,
                                               }).on('click', function(i, row){
                                                 console.log(row);





                                });  */


                                                              new  Morris.Bar({
                                                               element: '<?php echo e($master->id); ?>',
                                                               data: [

                                                                 <?php for($x = $tahunmulai; $x <= $tahunakhir; $x++): ?>

                                                                        {
                                                                             'periode': '<?php echo e($x); ?>',
                                                                             <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                     '<?php echo e($data_list->nama); ?>': <?php echo e($listnilai[$x][$data_list->id]); ?> <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                         } <?php if($x <  $tahunakhir ): ?> , <?php endif; ?>
                                                                 <?php endfor; ?> ],
                                                                         xkey: 'periode',
                                                                         ykeys: [  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                   '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                               ],
                                                                         labels: [ <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                                   '<?php echo e($data_list->nama); ?>' <?php if($key < count($list) - 1): ?> , <?php endif; ?>
                                                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                               ],
                                                                         stacked: false,
                                                                         hideHover: true

                                                             });

                                </script>



              <?php endif; ?>







        <?php endif; ?>





        Keterangan : <?php echo e($master->keterangan); ?><br>
        <i>Sumber  <?php echo e($master->sumber); ?></i>




</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>