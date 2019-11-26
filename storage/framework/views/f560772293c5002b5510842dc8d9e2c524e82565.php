<?php $__env->startSection('content'); ?>



          <?php if(Session::has('alert-success')): ?>
              <div class="alert alert-success">
                    <?php echo e(Session::get('alert-success')); ?>

                </div>
          <?php endif; ?>
          <!-- Single button -->


                    <a href="<?php echo e(URL::route('products.create')); ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Add Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Unit</th>
                                      <th>Harga</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Unit</th>
                                      <th>Harga</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                          <tr class="grade<?php echo e($products->id); ?>">
                                          <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('products.destroy', $products->id))); ?>

                                           <td>

                                             <a href="<?php echo e(URL::route('products.show', array($products->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   <?php echo e($products->id); ?>

                                             </a>

                                           </td>
                                          <td><?php echo e($products->name); ?></td>
                                          <td><?php echo e(Konversi::unit($products->unit_id)); ?></td>
                                          <td><?php echo e($products->price); ?></td>
                                          <td><?php echo e($products->notes); ?></td>


                                           <td>
                                             <a href="<?php echo e(URL::route('products.edit', array($products->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
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