<div class="panel-body table-responsive">
    <table class="table table-condensed">
        <thead>
            <tr>
								<th>ID</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Price</th>
								<th>Qty</th>

            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
						<tr class="grade<?php echo e($product->id); ?>">

								<td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e(Konversi::unit($product->unit_id)); ?></td>
                <td><?php echo e($product->price); ?></td>

								<td>
									<?php echo Form::open(array('id' => $product->id,'class' => 'form-inline delete_form', 'method' => 'POST', 'route' => array('draft_transactions.add_item', $product->id))); ?>


									<?php echo Form::number('qty', null,array('class' => 'form-control','name'=>'qty','required'=>'required'),''); ?>

									<?php echo Form::hidden('id_product', $product->id,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'id_product','id'=>'id_product','required'=>'required'),''); ?>

							    <?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> Add Item', array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


									<?php echo Form::close(); ?>



							 </td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3">
                    Produk tidak ditemukan dengan keyword : <strong><em><?php echo e(request('query')); ?></em></strong>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
	</div>

	<?php echo Form::model(new App\Master, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['transactions.store']]); ?>



	<?php echo Form::close(); ?>

