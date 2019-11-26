<?php $__env->startSection('content'); ?>
<div class="myClass">
  <?php if(Session::has('alert-success')): ?>
      <div class="alert alert-success">
            <?php echo e(Session::get('alert-success')); ?>

        </div>
  <?php endif; ?>
  <h4>  Data Bidang <?php echo e(Konversi::listing($master->id_bidang)); ?></h4>


    <a href="<?php echo e(URL::route('record.create', array($master->id))); ?>" class="btn btn-success">
       <span class="glyphicon glyphicon-plus"></span> Tambah Data
  </a>

  <p>
  <?php if($master->tipe=='0'): ?>
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                  <th>No</th>
                    <?php if($master->tipe_inputan=='1'): ?>
                            <th>Item</th>
                    <?php endif; ?>
                    <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <th><?php echo e($detil_master->nama); ?></th>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                  <th>Kabupaten</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>No</th>
                  <?php if($master->tipe_inputan=='1'): ?>
                          <th>Item</th>
                  <?php endif; ?>
                  <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <th><?php echo e($detil_master->nama); ?></th>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                  <th>Kabupaten</th>
                  <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

              <!-- looping row !-->
              <?php 
              $i=1;
               ?>
              <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <tr class="grade<?php echo e($tb_record->id); ?>">
                    <td><?php echo e($i); ?></td>
                  <!-- looping collomn !-->
                  <?php $__currentLoopData = $tb_record_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <?php if($master->tipe_inputan=='1'): ?>
                          <?php if($record_detail->id_record==$tb_record->id): ?>

                                    <!-- setiap record genap !-->


                                    <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                      <td>



                                           <?php echo e(Konversi::listing($nilai[0])); ?></td>
                                    <td>
                                      <?php if(is_numeric($nilai[1])): ?>
                                       <?php echo e(number_format($nilai[1],2)); ?>


                                        <?php else: ?>
                                        <?php echo e($nilai[1]); ?>

                                        <?php endif; ?>
                                    </td>




                          <?php endif; ?>


                      <?php else: ?>

                          <?php if($record_detail->id_record==$tb_record->id): ?>

                            <td><?php if(is_numeric($record_detail->nilai)): ?>
                               <?php echo e(number_format($record_detail->nilai)); ?>


                                <?php else: ?>
                                <?php echo e($record_detail->nilai); ?>

                                <?php endif; ?>


                             </td>

                          <?php endif; ?>

                      <?php endif; ?>


                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <td><?php echo e($tb_record->kabupaten); ?></td>
                       <td>
                         <a href="<?php echo e(URL::route('record.edit', array($tb_record->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                              <span class="glyphicon glyphicon glyphicon-edit"></span>
                         </a>

                      </td>

            </tr>
            <?php 
            $i++;
             ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
  <?php else: ?>
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
              <th>No</th>
                <?php if($master->tipe_inputan=='1'): ?>
                        <th>Item</th>
                <?php endif; ?>
                <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <th><?php echo e($detil_master->nama); ?></th>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


              <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>No</th>
              <?php if($master->tipe_inputan=='1'): ?>
                      <th>Item</th>
              <?php endif; ?>
              <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <th><?php echo e($detil_master->nama); ?></th>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


              <th>Action</th>
            </tr>
        </tfoot>
        <tbody>

          <!-- looping row !-->
          <?php 
          $i=1;
           ?>
          <?php $__currentLoopData = $tb_record; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_record): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <tr class="grade<?php echo e($tb_record->id); ?>">
                <td><?php echo e($i); ?></td>
              <!-- looping collomn !-->
              <?php $__currentLoopData = $tb_record_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $record_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <?php if($master->tipe_inputan=='1'): ?>
                      <?php if($record_detail->id_record==$tb_record->id): ?>

                                <!-- setiap record genap !-->


                                <?php  $nilai = explode(",", $record_detail->nilai);  ?>
                                  <td>



                                       <?php echo e(Konversi::listing($nilai[0])); ?></td>
                                <td>
                                  <?php if(is_numeric($nilai[1])): ?>
                                   <?php echo e(number_format($nilai[1],2)); ?>


                                    <?php else: ?>
                                    <?php echo e($nilai[1]); ?>

                                    <?php endif; ?>
                                </td>




                      <?php endif; ?>


                  <?php else: ?>

                      <?php if($record_detail->id_record==$tb_record->id): ?>

                        <td><?php if(is_numeric($record_detail->nilai)): ?>
                           <?php echo e(number_format($record_detail->nilai)); ?>


                            <?php else: ?>
                            <?php echo e($record_detail->nilai); ?>

                            <?php endif; ?>


                         </td>

                      <?php endif; ?>

                  <?php endif; ?>


              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              
                   <td>
                     <a href="<?php echo e(URL::route('record.edit', array($tb_record->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                          <span class="glyphicon glyphicon glyphicon-edit"></span>
                     </a>

                  </td>

        </tr>
        <?php 
        $i++;
         ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
  <?php endif; ?>
  Keterangan : <?php echo e($master->keterangan); ?><br>
  <i>Sumber  <?php echo e($master->sumber); ?></i>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>