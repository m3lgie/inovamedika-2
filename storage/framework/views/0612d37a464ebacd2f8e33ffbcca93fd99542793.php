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
                                      <th>Field</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Field</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $tb_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($tb_list->id); ?>">
                                           <td>

                                             <a href="<?php echo e(URL::route('listdetail.show', array($tb_list->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   <?php echo e($tb_list->id); ?>

                                             </a>

                                           </td>
                                          <td><?php echo e($tb_list->nama); ?></td>
                                          <td><?php echo e($tb_list->keterangan); ?></td>
                                          <td>
                                              <a href="<?php echo e(URL::route('listdetail.show', array($tb_list->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                     <?php echo e($tb_list->total); ?>  field
                                             </a>
                                          </td>


                                      <?php echo Form::close(); ?>

                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>