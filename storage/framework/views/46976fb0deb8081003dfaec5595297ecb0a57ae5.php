<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>


<?php echo Form::model(new App\transactions, ['class' => 'form-horizontal','novalidate','files'=>true,'route' => ['report.find']]); ?>






<div class="col-sm-12">
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-line">
              Tgl Mulai
              <?php echo Form::text('start', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'start','placeholder'=>'YYYY-mm-dd','required'=>'required'),''); ?>


            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-line">
              Tanggal Akhir
              <?php echo Form::text('end', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'end','placeholder'=>'YYYY-mm-dd','required'=>'required'),''); ?>


            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">


                        <?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.'Prosses', array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


        </div>
    </div>
</div>


<?php echo Form::close(); ?>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>