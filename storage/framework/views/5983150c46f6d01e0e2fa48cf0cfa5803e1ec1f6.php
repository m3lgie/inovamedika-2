<?php $__env->startSection('content'); ?>


            <?php if(Session::has('alert-success')): ?>
                <div class="alert alert-success">
                      <?php echo e(Session::get('alert-success')); ?>

                  </div>
            <?php endif; ?>
            <!-- Single button -->
      <div class="container-fluid">
        <h3> List <?php echo e($list); ?></h2>
        <a href="<?php echo e(URL::route('listdetail.createdetail', array($id_list))); ?>" class="btn btn-success">
           <span class="glyphicon glyphicon-plus"></span> Tambah Data
      </a>


      <p>

        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
              <?php $__currentLoopData = $tb_list_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tb_list_detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <tr class="grade<?php echo e($tb_list_detail->id); ?>">
                <?php echo Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('listdetail.destroy', $tb_list_detail->id))); ?>

                 <td>

                   <a href="<?php echo e(URL::route('listdetail.showdetail', array($tb_list_detail->id))); ?>" data-toggle="tooltip" data-placement="right" title="click to details" >
                         <?php echo e($tb_list_detail->id); ?>

                   </a>

                 </td>
                 <td><?php echo e($tb_list_detail->nama); ?></td>
                <td><?php echo e($tb_list_detail->keterangan); ?></td>

                       <td>
                         <a href="<?php echo e(URL::route('listdetail.edit', array($tb_list_detail->id))); ?>" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                              <span class="glyphicon glyphicon-edit"></span>
                         </a>
                         <?php echo e(Form::button('<span class="glyphicon glyphicon-trash"></span> ', array('class'=>'btn btn-danger','onclick'=>'ConfirmMessage()','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete Data'))); ?>


                      </td>
                  <?php echo Form::close(); ?>

            </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <i>Keterangan : Urutkan Susunan List Sesuai Dengan Dukumen, Posisi List Tidak Dapat Dirubah Jika Sesudah Diinput</i>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>