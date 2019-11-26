								  <div class="item form-group">

												<label class="control-label col-sm-3" for="name">Nama <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															<?php echo Form::text('nama', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'nama','placeholder'=>'Nama','required'=>'required'),''); ?>


														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Keterangan <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::textarea('keterangan', null,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'keterangan','placeholder'=>'Keterangan','required'=>'required'),''); ?>


													</div>

									</div>
								  </div>

									<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sumber <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::text('sumber', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'sumber','placeholder'=>'Sumber','required'=>'required'),''); ?>


													</div>

									</div>
								</div>
								<div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipe <span class="required">*</span></label>
									 <div class="col-sm-6">
											 <div class="form-line">
											<?php echo Form::select('tipe',  [null => '- Tipe -']+['Kabupaten','Provinsi'], null, ['id' => 'tipe','class' => 'show-tick form-control','required'=>'required']); ?>

											</div>
									</div>
							</div>
									<div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Akses <span class="required">*</span></label>
										 <div class="col-sm-6">
											 	 <div class="form-line">
												<?php echo Form::select('akses',  [null => '- Akses -']+['Internal','Eksternal'], null, ['id' => 'akses','class' => 'show-tick form-control','required'=>'required']); ?>

												</div>
										</div>
								</div>


								 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Bidang <span class="required">*</span></label>
								 <div class="col-sm-6">

												 <div class="form-line">

															<?php if(Request::is('master/*/edit')): ?>
																<?php 
																			$select=1;
																			$id_bidang=$tb_master->id_bidang;
																 ?>
															<?php else: ?>
																<?php 
																			$disable=0;
																			$id_bidang=0;
																 ?>
														 <?php endif; ?>

															<select name='id_bidang' class="form-control show-tick">
																  <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $bidang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
																		<option <?php if($id_bidang==$bidang->id): ?> selected <?php endif; ?> value='<?php echo e($bidang->id); ?>'><?php echo e($bidang->nama); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
															</select>
												 </div>

								 </div>
								</div>
								 <div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Inputan <span class="required">*</span></label>
										<div class="col-sm-6">
											 <?php echo Form::select('inputan',  [null => '- Inputan -']+['Single','Multiple'], null, ['id' => 'inputan','class' => 'show-tick form-control','onchange' => 'inputanOnChange()','required'=>'required']); ?>

									 </div>
							 </div>

								 <div id="tipe_inputan-select" class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipe Inputan <span class="required">*</span></label>
										 <div class="col-sm-6">
				 						 		<?php echo Form::select('tipe_inputan', [null => '- Tipe Inputan -']+['Input Manual','From List'], null, ['id' => 'tipe_inputan','class' => 'show-tick form-control','onchange' => 'tipe_inputanOnChange()']); ?>

	 									</div>
								</div>
								<div id="list-select" class="item form-group">
									<label class="control-label col-sm-3" for="satuan">List <span class="required">*</span></label>
										<div class="col-sm-6">

														<div class="form-line">

															<?php if(Request::is('master/*/edit')): ?>
																<?php 
																			$disable=1;
																			$id_list=$tb_master->id_list;
																 ?>
															<?php else: ?>
																<?php 
																			$disable=0;
																			$id_list=0;
																 ?>
														 <?php endif; ?>

															<?php echo Form::select('id_list', $list, $id_list, array('id' => 'list','class' => 'form-control show-tick','name'=>'id_list','data-live-search'=>'true','data-live-search'=>'true')); ?>


														</div>

										</div>
								</div>

								<div id="satuan-input" class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Satuan <span class="required">*</span></label>
										<div class="col-sm-6">
												<div class="form-line">
													<?php echo Form::text('satuan', null,array('id' => 'satuan','class' => 'form-control','data-validate-length-range'=>'5','name'=>'satuan','placeholder'=>'Satuan'),''); ?>


												</div>
										</div>
							 </div>


								 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span></label>
								 <div class="col-sm-6">


													 <?php echo Form::select('status',  [null => '- Status -']+['Active','Non Active'], null, ['class' => 'show-tick form-control','required'=>'required']); ?>




								 </div>
								</div>



									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		<?php if(Request::is('master/*/edit')): ?>

														<?php echo e(Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit'))); ?>

													<?php else: ?>
														<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


													<?php endif; ?>
										</div>
									</div>

</form>




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
