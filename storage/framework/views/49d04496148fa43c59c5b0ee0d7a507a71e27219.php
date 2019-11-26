<?php $__env->startSection('content'); ?>
      <div class="container-fluid">


<table class="table table-hover">
  <thead>
      <tr>
          <th>ID</th>
          <th>: <?php echo e($tb_view->id); ?></th>
      </tr>
  </thead>
    <tbody >
        <tr>
            <td><label>Nama</label></td>
            <td>: <?php echo e($tb_view->nama); ?></label></td>
        </tr>
        <tr>
            <td><label>Keterangan</label></td>
            <td>: <?php echo e($tb_view->keterangan); ?></td>
        </tr>
        <tr>
            <td><label>Table Master</label></td>
            <td>: <?php echo e($tb_master->nama); ?></td>
        </tr>
        <tr>
            <td><label>Tipe View</label></td>
            <td>: <?php echo e(Konversi::tipe_view($tb_view->tipe_view)); ?></td>
        </tr>
        <tr>
            <td><label>Tahun</label></td>
            <td>: <?php echo e(Konversi::tahun($tb_view->id_tahun)); ?></td>
        </tr>
        <tr>
            <td><label>Public</label></td>
            <td>: <?php echo e(Konversi::publish($tb_view->publish)); ?></td>
        </tr>
        <tr>
            <td><label>Dashoard</label></td>
            <td>: <?php echo e(Konversi::dasboard($tb_view->dasboard)); ?></td>
        </tr>
        <tr>
            <td><label>Status</label></td>
            <td>: <?php echo e(Konversi::status($tb_view->status)); ?></td>
        </tr>

        <tr>
            <td><label>Created By</label></td>
            <td>: <?php echo e(Konversi::user($tb_view->created_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Updated By</label></td>
            <td>: <?php echo e(Konversi::user($tb_view->updated_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Created At</label></td>
            <td>: <?php echo e($tb_view->created_at); ?></td>
        </tr>
        <tr>
            <td><label>Updated At</label></td>
            <td>: <?php echo e($tb_view->updated_at); ?></td>
        </tr>
    </tbody>
</table>
<a href="<?php echo e(URL::route('view.index')); ?>" class="btn btn-success">
   <span class="glyphicon glyphicon-chevron-left"></span> Back
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>