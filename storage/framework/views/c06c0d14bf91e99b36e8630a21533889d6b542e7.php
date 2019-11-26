<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>

				<?php if( Request::is('profile/*')): ?>
					<?php echo Form::model($users, ['method' => 'PATCH', 'route' => ['users.update_profile', $users->id],'class' => 'form-horizontal','files' => true]); ?>

 			<?php else: ?>
				 <?php echo Form::model($users, ['method' => 'PATCH', 'route' => ['users.update', $users->id],'class' => 'form-horizontal','files' => true]); ?>


			 <?php endif; ?>

       			 <?php echo $__env->make('users/form/form', ['submit_text' => 'Edit Data Users'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   				 <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>