<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->


                    <a href="<?php echo e(URL::route('tahun.create')); ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Tambah Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $tb_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_tahun): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($tb_tahun->id); ?>">
                                          <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('tahun.destroy', $tb_tahun->id))); ?>

                                          <td>

                                              <a href="<?php echo e(URL::route('tahun.show', array($tb_tahun->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                    <?php echo e($tb_tahun->id); ?>

                                              </a>

                                            </td>
                                          <td><?php echo e($tb_tahun->tahun); ?></td>
                                          <td><?php echo e($tb_tahun->keterangan); ?></td>
                                          <td><?php echo e(Konversi::status($tb_tahun->status)); ?></td>


                                           <td>
                                             <a href="<?php echo e(URL::route('tahun.edit', array($tb_tahun->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
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