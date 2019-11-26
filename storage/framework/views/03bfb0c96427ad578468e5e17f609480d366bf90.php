<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->

          <ul class="nav nav-tabs" role="tablist">

                <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data_bidang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li role="presentation"  <?php if($key==0): ?> class="active" <?php endif; ?>>
                    <a href="#<?php echo e($data_bidang->id); ?>" data-toggle="tab">
                        <i class="material-icons">list</i> <?php echo e($data_bidang->nama); ?>

                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


          </ul>
          <div class="tab-content">
          <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data_bidang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <div role="tabpanel" class="tab-pane fade <?php if($key==0): ?> in active <?php endif; ?> " id="<?php echo e($data_bidang->id); ?>">

              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead >
                      <tr >
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Sumber</th>
                        <th>Status</th>

                        <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot align='center'>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Sumber</th>
                        <th>Status</th>

                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php $__currentLoopData = $tb_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_tb_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <?php if($data_tb_master->id_bidang==$data_bidang->id): ?>

                                  <tr class="grade<?php echo e($data_tb_master->id); ?>">
                                  <?php echo Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('master.destroy', $data_tb_master->id))); ?>

                                   <td>

                                  <?php echo e($data_tb_master->id); ?>


                                   </td>
                                  <td><?php echo e($data_tb_master->nama); ?></td>
                                  <td><?php echo e($data_tb_master->keterangan); ?></td>
                                  <td><?php echo e($data_tb_master->sumber); ?></td>
                                  <td align='center'><?php if($data_tb_master->statusrecord>0): ?>
                                     <button type="button" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="top" title="Lengkap"><span class="glyphicon glyphicon glyphicon-ok"></span> </button>
                                      <span class="label bg-light-blue">Lengkap</span>
                                      <?php else: ?>
                                      <button type="button" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="Belum Lengkap"><span class="glyphicon glyphicon glyphicon-remove-sign"></span> </button>
                                      <span class="label bg-red">Belum Lengkap</span>
                                     <?php endif; ?>
                                  </td>


                                   <td align='center'>
                                     <a href="<?php echo e(URL::route('record.create', array($data_tb_master->id))); ?>" data-toggle="tooltip" data-placement="top" title="Create Data" class="btn btn-info">
                                          <span class="glyphicon glyphicon glyphicon-file"></span>
                                     </a>
                                     <a href="<?php echo e(URL::route('record.show', array($data_tb_master->id))); ?>" data-toggle="tooltip" data-placement="top" title="View Record" class="btn btn-danger">
                                          <span class="glyphicon glyphicon glyphicon-eye-open"></span>
                                     </a>

                                  </td>
                              <?php echo Form::close(); ?>

                            </tr>
                        <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </tbody>
              </table>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>