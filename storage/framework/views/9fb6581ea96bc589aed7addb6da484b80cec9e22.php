<?php $__env->startSection('content'); ?>
      <div class="container-fluid">


<table class="table table-hover">
  <thead>
      <tr>
          <th>ID</th>
          <th>: <?php echo e($tb_master->id); ?></th>
      </tr>
  </thead>
    <tbody >
        <tr>
            <td><label>Nama</label></td>
            <td>: <?php echo e($tb_master->nama); ?></label></td>
        </tr>
        <tr>
            <td><label>Keterangan</label></td>
            <td>: <?php echo e($tb_master->keterangan); ?></td>
        </tr>
        <tr>
            <td><label>Sumber</label></td>
            <td>: <?php echo e($tb_master->sumber); ?></td>
        </tr>
        <tr>
            <td><label>Akses</label></td>
            <td>: <?php echo e(Konversi::akses($tb_master->akses)); ?> </td>
        </tr>
        <tr>
            <td><label>Inputan</label></td>
            <td>: <?php echo e(Konversi::inputan($tb_master->inputan)); ?> </td>
        </tr>
        <tr>
            <td><label>Tipe Inputan</label></td>
            <td>: <?php echo e(Konversi::tipe_inputan($tb_master->tipe_inputan)); ?></td>
        </tr>
        <tr>
            <td><label>List</label></td>
            <td>: <?php echo e(Konversi::listmaster($tb_master->id_list)); ?></td>
        </tr>
        <tr>
            <td><label>Status</label></td>
            <td>: <?php echo e(Konversi::status($tb_master->status)); ?></td>
        </tr>
        <tr>
            <td><label>Created By</label></td>
            <td>: <?php echo e(Konversi::user($tb_master->created_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Updated By</label></td>
            <td>: <?php echo e(Konversi::user($tb_master->updated_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Created At</label></td>
            <td>: <?php echo e($tb_master->created_at); ?></td>
        </tr>
        <tr>
            <td><label>Updated At</label></td>
            <td>: <?php echo e($tb_master->updated_at); ?></td>
        </tr>
    </tbody>
</table>
<a href="<?php echo e(URL::route('master.index')); ?>" class="btn btn-success">
   <span class="glyphicon glyphicon-chevron-left"></span> Back
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>