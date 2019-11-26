<?php $__env->startSection('content'); ?>



  <div style="min-height:500px"; class="item form-group">

  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="name">Tahun Laporan <span class="required">*</span>
  </label>

    <?php echo Form::open(array('route' => 'record.datamaster', 'method' => 'post')); ?>


  <div class="col-md-6 ">
    <?php echo Form::select('tahun', $tahun, null, array('class' => 'select2_single form-control','name'=>'tahun','required'=>'required')); ?>

  </div>
  <div class="col-md-12 ">

    <?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> Proses', array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


 </form>

 </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>