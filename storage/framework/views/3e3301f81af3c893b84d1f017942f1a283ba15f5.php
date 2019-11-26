<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->


                    <a href="<?php echo e(URL::route('master.create')); ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Tambah Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Bidang</th>
                                      <th>Keterangan</th>
                                      <th>Sumber</th>
                                      <th>Akses</th>
                                      <th>Status</th>

                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Bidang</th>
                                      <th>Keterangan</th>
                                      <th>Sumber</th>
                                      <th>Akses</th>
                                      <th>Status</th>

                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $tb_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($tb_master->id); ?>">
                                          <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('master.destroy', $tb_master->id))); ?>

                                           <td>

                                             <a href="<?php echo e(URL::route('master.show', array($tb_master->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   <?php echo e($tb_master->id); ?>

                                             </a>

                                           </td>
                                          <td><?php echo e($tb_master->nama); ?></td>
                                          <td><?php echo e(Konversi::listing($tb_master->id_bidang)); ?></td>
                                          <td><?php echo e($tb_master->keterangan); ?></td>
                                          <td><?php echo e($tb_master->sumber); ?></td>
                                          <td><?php echo e(Konversi::akses($tb_master->akses)); ?></td>
                                          <td><?php echo e(Konversi::status($tb_master->status)); ?></td>


                                           <td>
                                             <a href="<?php echo e(URL::route('master.edit', array($tb_master->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                             </a>
                                             <?php echo e(Form::button('<span class="glyphicon glyphicon-trash"></span> ', array('class'=>'btn btn-danger','onclick'=>'ConfirmMessage()','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete Data'))); ?>


                                          </td>
                                      <?php echo Form::close(); ?>

                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>