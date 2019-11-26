<div class="item form-group ">



	<div class="col-sm-8 ">
	<label class="control-label col-sm-12 " for="name">Item Order <span class="required"> </span></label>

		<?php echo Form::model(new App\DraftTransactionDetails, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['draft_transaction_details.update_item']]); ?>


	<table class="table table-striped table-hover">
			<thead>
					<tr>
						<th>#</th>
						<th>Name Item</th>
						<th>Price</th>
						<th width="10%">Disc %</th>
						<th width="10%">Qty</th>
						<th>Subtotal</th>

						<th>Action</th>
					</tr>
			</thead>

			</tfoot>
			<tbody id='order'>
				<?php 
				$i=1;
				$subtotal=0;
				$total=0;
				$totaldisc=0;
				 ?>
    <?php $__currentLoopData = $draft_transactions_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

						<tr>
							<td><?php echo e($i); ?> <?php echo Form::hidden('id', $product->id,array('class' => 'form-control','name'=>'id[]','required'=>'required'),''); ?></td>
							<td><?php echo e($product->name); ?></td>
							<td><?php echo e(Konversi::rupiah($product->price)); ?></td>
							<td><?php echo Form::number('disc', $product->disc,array('class' => 'form-control','name'=>'disc[]', 'max' => '100', 'required'=>'required'),''); ?>

							</td>
							<td><?php echo Form::number('qty', $product->qty,array('class' => 'form-control','name'=>'qty[]','required'=>'required'),''); ?>

							</td>
							<td><?php echo e(Konversi::rupiah($product->price*$product->qty)); ?></td>
							<td>
								<a href="<?php echo e(URL::route('draft_transactions.delete_item', array($product->id_product))); ?>" data-toggle="tooltip" data-placement="top" title="Delete Item" class="btn btn-danger">
										  <span class="glyphicon glyphicon-trash"></span>
								</a>


	</td>
					</tr>
					<?php 
					$subtotal+=$product->price*$product->qty;
					$totaldisc+=$product->price*$product->disc/100;
					$i++;
					 ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php 

					$total=$subtotal-$totaldisc;

					 ?>
				<tr><td colspan="4">Subtotal</td><td>:</td><td colspan="2"><?php echo e(Konversi::rupiah($subtotal)); ?></td></tr>
				<tr><td colspan="4">Total Disc</td><td>:</td><td colspan="2"><?php echo e(Konversi::rupiah($totaldisc)); ?></td></tr>
				<tr><td colspan="4">Total</td><td>:</td><td colspan="2"><?php echo e(Konversi::rupiah($total)); ?> 		<?php echo Form::hidden('total', $total,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'total','required'=>'required'),''); ?>

</td></tr>

			</tbody>
	</table>
	<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '."Update Order", array('class'=>'btn btn-success', 'type'=>'submit'))); ?>




		</div>
<?php echo Form::close(); ?>



<?php echo Form::model(new App\Transactions, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['transactions.store']]); ?>



	<div class="col-sm-4">
	<label class="control-label col-sm-12" for="name">Order Details</label>


								<label class="control-label col-sm-12" for="name">Name Customers <span class="required">*</span></label>

								<div class="col-sm-12">

										<div class="form-line">
											<?php echo Form::text('customer_name', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'customer_name','required'=>'required'),''); ?>


										</div>
								</div>





								<label class="control-label col-sm-12" for="name">Phone <span class="required">*</span></label>

								<div class="col-sm-12">

										<div class="form-line">
											<?php echo Form::number('customer_phone', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'customer_phone','required'=>'required'),''); ?>


										</div>
								</div>





								<label class="control-label col-sm-12" for="name">Payment <span class="required">*</span></label>

								<div class="col-sm-12">
									<?php echo Form::hidden('total', $total,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'total','required'=>'required'),''); ?>


										<div class="form-line">
											<?php echo Form::number('payment', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'payment','required'=>'required'),''); ?>


										</div>
								</div>


								<label class="control-label col-sm-12" for="name">Notes <span class="required">*</span></label>

								<div class="col-sm-12">

										<div class="form-line">
											<?php echo Form::text('notes', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'notes','required'=>'required'),''); ?>


										</div>
								</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">


										<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>



						</div>
					</div>



		</div>

		<div class="item form-group">

					

		</div>




	<?php echo Form::close(); ?>

</div>










<script>
$('#tipe_inputan-select').hide();
$('#list-select').hide();
$('#satuan-input').hide();


        $(document).ready();
				function inputanOnChange() {

					var inputan = document.getElementById('inputan').value;
					if (inputan == '0') {

						 	$('#tipe_inputan-select').hide();
							$("#tipe_inputan").prop("required", false);
		 		 } else if (inputan == '1') {

						  $('#tipe_inputan-select').show();
							$("#tipe_inputan").prop("required", true);
		 		 }
				 else {

						  $('#tipe_inputan-select').hide();
							$('#list-select').hide();
							$('#satuan-input').hide();

							$("#tipe_inputan").prop("required", false);
							$("#list").prop("required", false);
							$("#satuan").prop("required", false);
		 		 }
        }

				function tipe_inputanOnChange() {

					var tipe_inputan = document.getElementById('tipe_inputan').value;
					if (tipe_inputan == '0') {
		 					$('#list-select').hide();
							$('#satuan-input').hide();

		 		 } else if (tipe_inputan == '1') {

						  $('#list-select').show();
							$('#satuan-input').show();

							$("#list").prop("required", true);
							$("#satuan").prop("required", true);



		 		 }
				 else {

						  $('#list-select').hide();
							$('#satuan-input').hide();

							$("#list").prop("required", false);
							$("#satuan").prop("required", false);
		 		 }
        }







 </script>
