<?php $__env->startSection('content'); ?>


            <?php if(Session::has('alert-success')): ?>
                <div class="alert alert-success">
                      <?php echo e(Session::get('alert-success')); ?>

                  </div>
            <?php endif; ?>
            <!-- Single button -->
      <div class="container-fluid">
        <h3> Table Master <?php echo e($master); ?></h2>
        <a href="<?php echo e(URL::route('masterdetail.createdetail', array($id_master))); ?>" class="btn btn-success">
           <span class="glyphicon glyphicon-plus"></span> Tambah Data
      </a>


      <p>

        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <th>Tipe Nilai</th>
                  <th>Operasi</th>
                  <th>Grafik</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <th>Tipe Nilai</th>
                  <th>Operasi</th>
                  <th>Grafik</th>
                  <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <tr class="grade<?php echo e($tb_detil_master->id); ?>">
                <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('masterdetail.destroy', $tb_detil_master->id))); ?>

                 <td>

                   <a href="<?php echo e(URL::route('masterdetail.showdetail', array($tb_detil_master->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                         <?php echo e($tb_detil_master->id); ?>

                   </a>

                 </td>
                  <td><?php echo e($tb_detil_master->nama); ?></td>
                      <td><?php echo e($tb_detil_master->satuan); ?></td>
                      <td><?php echo e($tb_detil_master->keterangan); ?></td>
                      <td><?php echo e(Konversi::tipe_value($tb_detil_master->tipe_value)); ?></td>
                      <td><?php echo e(Konversi::operation($tb_detil_master->operation)); ?></td>
                      <td><?php echo e(Konversi::grafik($tb_detil_master->graph)); ?></td>

                       <td>
                         <a href="<?php echo e(URL::route('masterdetail.edit', array($tb_detil_master->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                              <span class="glyphicon glyphicon-edit"></span>
                         </a>
                         <?php echo e(Form::button('<span class="glyphicon glyphicon-trash"></span> ', array('class'=>'btn btn-danger','onclick'=>'ConfirmMessage()','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete Data'))); ?>


                      </td>
                  <?php echo Form::close(); ?>

            </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <!-- Confirm Js -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>