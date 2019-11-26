<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>

    			<?php echo Form::model($tb_detil_master, ['method' => 'PATCH', 'route' => ['masterdetail.update', $tb_detil_master->id],'class' => 'form-horizontal','files' => true]); ?>


       			 <?php echo $__env->make('masterdetail/form/form', ['submit_text' => 'Edit Data Master Table'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   				 <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>