<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>



			

    			<?php echo Form::model(new App\Transactions, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['transactions.save', $draft_transactions[0]->id]]); ?>


        		<?php echo $__env->make('drafttransactions/form/show', ['submit_text' => 'Simpan Transaction'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    			<?php echo Form::close(); ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>