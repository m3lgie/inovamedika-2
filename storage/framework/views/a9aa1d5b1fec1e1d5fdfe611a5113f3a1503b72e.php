<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->


                    <a href="<?php echo e(URL::route('transactions.create')); ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Add Oder
                  </a>

                  <p>

                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>No Invoice</th>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Total</th>
                                      <th>payment</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>No Invoice</th>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Total</th>
                                      <th>payment</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactions): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($transactions->id); ?>">
                                           <td>

                                             <a href="<?php echo e(URL::route('transactions.show', array($transactions->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   <?php echo e($transactions->id); ?>

                                             </a>

                                           </td>
                                          <td><?php echo e($transactions->invoice_no); ?></td>
                                          <td><?php echo e($transactions->date); ?></td>
                                          <td><?php echo e($transactions->customer_name); ?></td>
                                          <td><?php echo e($transactions->customer_phone); ?></td>
                                          <td><?php echo e(Konversi::rupiah($transactions->total)); ?></td>
                                          <td><?php echo e(Konversi::rupiah($transactions->payment)); ?></td>
                                          <td> <?php echo e(Konversi::status($transactions->status)); ?></td>

                                           <td>
                                             <a href="<?php echo e(URL::route('transactions.edit', array($transactions->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                             </a>

                                          </td>

                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>