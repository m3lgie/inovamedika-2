

<input type='hidden' class='form-control' data-validate-length-range='5'  name='id_master' value=<?php echo e($id_master); ?> placeholder='<?php echo e($id_master); ?>'>

<?php if(!Request::is('record/*/edit')): ?>
		 <?php if($master->tipe=='0'): ?>
				<div class="item form-group">
				<label class="control-label col-sm-3" for="name">Kabupaten<span class="required">*</span></label>
				<div class="col-sm-4">

								<div class="form-line">

								 <?php if(Auth::user()->level!=3): ?>
									<?php echo Form::select('kabupaten', $kabupaten, null, array('class' => 'form-control show-tick','name'=>'id_kabupaten','data-live-search'=>'true','data-live-search'=>'true','required'=>'required','disable'=>'true')); ?>

								 <?php else: ?>
									 <?php echo Form::select('id_kabupaten',  [Auth::user()->id_kabupaten => Konversi::kabupaten(Auth::user()->id_kabupaten)], null, ['id' => 'id_kabupaten','class' => 'show-tick form-control','required'=>'required']); ?>

				 				 <?php endif; ?>
								</div>

				</div>
				</div>
			<?php else: ?>
				<div class="item form-group">
				<label class="control-label col-sm-3" for="name">Provinsi <span class="required">*</span></label>
				<div class="col-sm-4">

								<div class="form-line">

								 <?php if(Auth::user()->level!=3): ?>
									 <?php echo Form::select('id_kabupaten',['Riau'], null, ['id' => 'id_kabupaten','class' => 'show-tick form-control']); ?>

								 <?php endif; ?>
								</div>

				</div>
				</div>

			<?php endif; ?>
 <?php endif; ?>

<!-- jika tipe inputan multiple from list !-->

<?php if($master->tipe_inputan=='1'): ?>
	<?php if(Request::is('record/*/edit')): ?>
			<div class="item form-group">
						<?php  $nilai = explode(",", $recorddetail[0]->nilai);  ?>

						<label class="control-label col-sm-3" for="name"><?php echo e(Konversi::listing($nilai[0])); ?><span class="required">*</span></label>

					<div class="col-sm-6">
						<div class="row clearfix">
								<div class="col-sm-8">
												<div class="form-line">
													<input type='hidden'	 class='form-control' data-validate-length-range='5'  name='recorddetail[0]' 	 value='<?php echo e($nilai[0]); ?>' placeholder='nilai' required >
													<input type='number'	 class='form-control' data-validate-length-range='5'  name='recorddetail[1]' 	 step=".01" value='<?php echo e($nilai[1]); ?>' placeholder='nilai' required >
												</div>




								</div>


					</div>
	<?php else: ?>
	 	<div class="item form-group">
			<label class="control-label col-sm-3" for="name"></label>
			<div class="col-sm-9">

			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
							<tr>
								<th>No</th>
										<?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tb_detil): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<th><?php echo e($tb_detil->nama); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tr>
					</thead>
					<tfoot>
							<tr>
								<th>No</th>
										<?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tb_detil): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<th><?php echo e($tb_detil->nama); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tr>
					</tfoot>
					<tbody>
						<?php 
						$i=1;
						 ?>
						<?php $__currentLoopData = $tb_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr class="grade<?php echo e($list->id); ?>">
										<td><?php echo e($i); ?></td>
								    <td><?php echo e($list->nama); ?></td>
										<?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tb_detil): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

												<td>
														<div class="row clearfix">
																<div class="col-sm-8">
																	<div class="form-line">

																			<input type=<?php if($tb_detil->tipe_value=='0'): ?> 'number' step=".01" <?php else: ?> 'text' <?php endif; ?>
																				  class='form-control' data-validate-length-range='5'  name='recorddetail<?php echo e($list->id); ?>' 	<?php if(Request::is('record/*/edit')): ?> value='<?php echo e($value); ?>' <?php endif; ?> placeholder='<?php echo e($tb_detil->nama); ?>' required >
																	</div>
																</div>
																<div class="col-sm-4">
																		<?php echo e($tb_detil->satuan); ?>

																</div>
														</div>
												</td>


										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tr>
						<?php 
			      $i++;
			       ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

					</tbody>
				</table>

				</div>
			</div>
		<?php endif; ?>
<?php else: ?>
	<?php $__currentLoopData = $tb_detil_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tb_detil_master): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="item form-group">
		<label class="control-label col-sm-3" for="name"><?php echo e($tb_detil_master->nama); ?><span class="required">*</span></label>
		<div class="col-sm-6">

					<?php if(Request::is('record/*/edit')): ?>
					<!-- get value from detail record !-->
						<?php $__currentLoopData = $recorddetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recordvalue): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($recordvalue->id_detil_master==$tb_detil_master->id): ?>
									<?php 
										$value=$recordvalue->nilai;
									 ?>

								<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					<?php else: ?>
						<?php 
							$value="0";
						 ?>
					<?php endif; ?>

					<div class="row clearfix">
							<div class="col-sm-8">

								<div class="form-line">
									<input type=<?php if($tb_detil_master->tipe_value=='0'): ?> 'number' step=".01"  <?php else: ?> 'text' <?php endif; ?>
										 class='form-control' data-validate-length-range='5'  name='recorddetail[<?php echo e($key); ?>]' 	<?php if(Request::is('record/*/edit')): ?> value='<?php echo e($value); ?>' <?php endif; ?> placeholder='<?php echo e($tb_detil_master->nama); ?>' required >
								</div>

							</div>
							<div class="col-sm-4">
										<?php echo e($tb_detil_master->satuan); ?>

   						</div>

				</div>

		</div>
		</div>
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>



<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		<?php if(Request::is('record/*/edit')): ?>

														<?php echo e(Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit'))); ?>

													<?php else: ?>
														<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


													<?php endif; ?>
										</div>
									</div>

</form>
