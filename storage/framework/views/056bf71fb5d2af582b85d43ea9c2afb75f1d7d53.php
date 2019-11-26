<?php $__env->startSection('content'); ?>

				<?php if($errors->any()): ?>
					<div class='flash alert-danger'>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<p><?php echo e($error); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</div>
				<?php endif; ?>


				<div class="item form-group ">

						<div class="col-sm-12 ">
								<h5>InvoiceNo : <?php echo e($transactions->invoice_no); ?></h5><br>
								Status : <?php echo e(Konversi::status($transactions->status)); ?>

						</div>

					<div class="col-sm-8 ">

					<label class="control-label col-sm-12 " for="name">Item Order <span class="required"> </span></label>

					<table class="table table-striped table-hover">
							<thead>
									<tr>
										<th>#</th>
										<th>Name Item</th>
										<th>Price</th>
										<th width="10%">Disc %</th>
										<th width="10%">Qty</th>
										<th>Subtotal</th>


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
				    <?php $__currentLoopData = $transaction_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

										<tr>
											<td><?php echo e($i); ?> <?php echo Form::hidden('id', $product->id,array('class' => 'form-control','name'=>'id[]','required'=>'required'),''); ?></td>
											<td><?php echo e($product->name); ?></td>
											<td><?php echo e(Konversi::rupiah($product->price)); ?></td>
											<td><?php echo e($product->disc); ?>

											</td>
											<td><?php echo e($product->qty); ?>

											</td>
											<td><?php echo e(Konversi::rupiah($product->price*$product->qty)); ?></td>

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
								<tr><td colspan="4">Total</td><td>:</td><td colspan="2"><?php echo e(Konversi::rupiah($total)); ?>

				</td></tr>

							</tbody>
					</table>
						</div>

						<div class="col-sm-4">
						<label class="control-label col-sm-12" for="name">Order Details</label>



													<label class="control-label col-sm-12" for="name">Name Customers </label>
													<br>
													<label class="control-label col-sm-12" for="name"><?php echo e($transactions->customer_name); ?></label>


													<br>


													<label class="control-label col-sm-12" for="name">Phone </label>
													<br>
													<label class="control-label col-sm-12" for="name"><?php echo e($transactions->customer_phone); ?> </label>





													<br>
													<label class="control-label col-sm-12" for="name">Payment </label>
													<br>
													<label class="control-label col-sm-12" for="name"><?php echo e(Konversi::rupiah($transactions->payment)); ?> </label>


													<br>
													<label class="control-label col-sm-12" for="name">Total </label>
													<br>
													<label class="control-label col-sm-12" for="name"><?php echo e(Konversi::rupiah($total)); ?> </label>
													<br>
													<label class="control-label col-sm-12" for="name">Notes </label>
													<br>
													<label class="control-label col-sm-12" for="name"><?php echo e($transactions->notes); ?> </label>



							</div>

				</div>


    			<?php echo Form::model($transactions, ['method' => 'PATCH', 'route' => ['transactions.update', $transactions->id],'class' => 'form-horizontal','files' => true]); ?>


       			 <?php echo $__env->make('transactions/form/form_edit', ['submit_text' => 'Edit Data Transactions'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   				 <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>