<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>

					<?php if(($master->akses=='0' and Auth::user()->level!=3) or ($master->akses=='1')): ?>
						<?php echo Form::model(new App\Record, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['record.store']]); ?>

							<?php echo $__env->make('record/form/form', ['submit_text' => 'Tambah Data'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo Form::close(); ?>


					<?php else: ?>
						Anda Tidak Dapat Menginputkan Data
					<?php endif; ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>