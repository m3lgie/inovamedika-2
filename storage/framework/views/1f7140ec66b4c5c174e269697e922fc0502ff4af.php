<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->






                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Sumber</th>
                                      <th>Field</th>
                                      <th>Status</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Sumber</th>
                                      <th>Field</th>
                                      <th>Status</th>


                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $tb_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($tb_master->id); ?>">
                                           <td>

                                             <a href="<?php echo e(URL::route('masterdetail.show', array($tb_master->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   <?php echo e($tb_master->id); ?>

                                             </a>

                                           </td>
                                          <td><?php echo e($tb_master->nama); ?></td>
                                          <td><?php echo e($tb_master->keterangan); ?></td>
                                          <td><?php echo e($tb_master->sumber); ?></td>
                                          <td>
                                              <a href="<?php echo e(URL::route('masterdetail.show', array($tb_master->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                     <?php echo e($tb_master->total); ?>  field
                                             </a>
                                          </td>
                                          <td><?php echo e(Konversi::status($tb_master->status)); ?></td>



                                      <?php echo Form::close(); ?>

                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>

                            <!-- Confirm Js -->
                            <script src="<?php echo e(asset('template/js/confirm.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>