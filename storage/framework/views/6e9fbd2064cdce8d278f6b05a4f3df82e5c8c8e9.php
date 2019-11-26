<?php $__env->startSection('content'); ?>
      <div class="container-fluid">
<?php echo e(Auth::user()->id); ?>

<table class="table table-hover">
  <thead>
      <tr>
          <th>ID</th>
          <th>: <?php echo e($users->id); ?></th>
      </tr>
  </thead>
    <tbody >
        <tr>
            <td><label>Nama</label></td>
            <td>: <?php echo e($users->name); ?></label></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td>: <?php echo e($users->email); ?></label></td>
        </tr>
        <tr>
            <td><label>Username</label></td>
            <td>: <?php echo e($users->username); ?></td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td>: <?php echo e($users->password); ?></td>
        </tr>
        <tr>
            <td><label>Level</label></td>
            <td>: <?php echo e(Konversi::level($users->level)); ?></td>
        </tr>
        <tr>
            <td><label>OPD</label></td>
            <td>: <?php echo e(($tb_opd->nama)); ?></td>
        </tr>
        <tr>
            <td><label>Kabupaten</label></td>
            <td>: <?php echo e(($tb_kabupaten->kabupaten)); ?></td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td>: <?php echo e(Konversi::status($users->status)); ?></td>
        </tr>

        <tr>
            <td><label>Created By</label></td>
            <td>: <?php echo e(Konversi::user($users->created_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Updated By</label></td>
            <td>: <?php echo e(Konversi::user($users->updated_by)); ?> </td>
        </tr>
        <tr>
            <td><label>Created At</label></td>
            <td>: <?php echo e($users->created_at); ?></td>
        </tr>
        <tr>
            <td><label>Updated At</label></td>
            <td>: <?php echo e($users->updated_at); ?></td>
        </tr>
    </tbody>
</table>

<a href="<?php echo e(URL::route('users.show', array($users->id_master))); ?>" class="btn btn-success">
   <span class="glyphicon glyphicon-chevron-left"></span> Back
</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>