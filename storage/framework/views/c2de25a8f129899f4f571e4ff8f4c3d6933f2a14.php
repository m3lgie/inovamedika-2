<?php $__env->startSection('content'); ?>
      <div class="container-fluid">

        <?php 
            $tahunmulai= date('Y');
            $tahunakhir= date('Y')-7;
         ?>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#5tahun" data-toggle="tab">
                      <i class="material-icons">list</i> 5 Tahun
                </a>
            </li>
            <?php for($x = $tahunmulai; $x >= $tahunakhir; $x--): ?>
              <li role="presentation">
                  <a href="#<?php echo e($x); ?>" data-toggle="tab">
                      <i class="material-icons">list</i> <?php echo e($x); ?>

                  </a>
              </li>
           <?php endfor; ?>


        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="5tahun">
              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    $i=1;
                     ?>
                    <?php $__currentLoopData = $tb_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_tb_view): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($data_tb_view->tipe_view==1): ?>
                            <tr class="grade<?php echo e($data_tb_view->id); ?>">
                              <td>

                                <?php echo e($i); ?>


                              </td>

                            <td><?php echo e($data_tb_view->nama); ?></td>
                            <td><?php echo e($data_tb_view->keterangan); ?></td>
                            <td>
                               <a href="<?php echo e(url('/data/'.$data_tb_view->id)); ?>" data-toggle="tooltip" data-placement="top" title="View Data" class="btn btn-info">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                               </a>

                            </td>

                          </tr>
                        <?php endif; ?>
                  <?php 
                  $i++;
                   ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </tbody>
              </table>

            </div>
            <?php for($x = $tahunmulai; $x >= $tahunakhir; $x--): ?>

              <div role="tabpanel" class="tab-pane fade" id="<?php echo e($x); ?>">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                      $i=1;
                       ?>
                      <?php $__currentLoopData = $tb_view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_tb_view): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($data_tb_view->tipe_view==0 and $data_tb_view->id_tahun==Konversi::idtahun($x)): ?>
                                <tr class="grade<?php echo e($data_tb_view->id); ?>">
                                  <td>

                                    <?php echo e($i); ?>


                                  </td>

                                <td><?php echo e($data_tb_view->nama); ?></td>
                                <td><?php echo e($data_tb_view->keterangan); ?></td>
                                <td>
                                   <a href="<?php echo e(url('/data/'.$data_tb_view->id)); ?>" data-toggle="tooltip" data-placement="top" title="View Data" class="btn btn-info">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                   </a>

                                </td>

                              </tr>
                              <?php 
                              $i++;
                               ?>
                        <?php endif; ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
              </div>
           <?php endfor; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>