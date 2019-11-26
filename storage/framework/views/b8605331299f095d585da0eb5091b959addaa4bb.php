<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->


                    <a href="<?php echo e(URL::route('view.create')); ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Tambah Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Table Master</th>
                                      <th>Tipe View</th>
                                      <th>Tahun</th>
                                      <th>Publish</th>
                                      <th>Dasboard</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Keterangan</th>
                                      <th>Table Master</th>
                                      <th>Tipe View</th>
                                      <th>Tahun</th>
                                      <th>Publish</th>
                                      <th>Dasboard</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $tb_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_view): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($tb_view->id); ?>">
                                          <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('view.destroy', $tb_view->id))); ?>

                                          <td>

                                              <a href="<?php echo e(URL::route('view.show', array($tb_view->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                    <?php echo e($tb_view->id); ?>

                                              </a>

                                            </td>

                                          <td><?php echo e($tb_view->nama); ?></td>
                                          <td><?php echo e($tb_view->keterangan); ?></td>
                                          <td><?php echo e($tb_view->master); ?></td>
                                          <td><?php echo e(Konversi::tipe_view($tb_view->tipe_view)); ?></td>
                                          <td><?php echo e(Konversi::tahun($tb_view->id_tahun)); ?></td>
                                          <td><?php echo e(Konversi::publish($tb_view->publish)); ?></td>
                                          <td><?php echo e(Konversi::dasboard($tb_view->dasboard)); ?></td>
                                          <td><?php echo e(Konversi::status($tb_view->status)); ?></td>


                                           <td>
                                             <a href="<?php echo e(URL::route('view.edit', array($tb_view->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
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