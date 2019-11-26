
										<div class="item form-group">
										<label class="control-label col-sm-3" for="name">Table Master <span class="required">*</span></label>
										<div class="col-sm-6">
												<h5><?php echo e($nama); ?></h5>
										</div>
										</div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="name">Nama <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::text('nama', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'nama','placeholder'=>'Nama','required'=>'required'),''); ?>


													</div>

									</div>
								</div>

									<div class="item form-group">
										<label class="control-label col-sm-3" for="satuan">Satuan <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">
																<?php echo Form::text('satuan', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'satuan','placeholder'=>'Satuan','required'=>'required'),''); ?>


															</div>

											</div>
								  </div>




									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">
																<?php echo Form::text('keterangan', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'keterangan','placeholder'=>'Keterangan','required'=>'required'),''); ?>


															</div>

											</div>
								 </div>
								 <div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipe Nilai <span class="required">*</span></label>
										 <div class="col-sm-6">
				 						 		<?php echo Form::select('tipe_value', [null => '- Tipe Nilai -']+['Number','Text'], null, ['class' => 'show-tick form-control','required'=>'required']); ?>

	 									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Operation <span class="required">*</span></label>
										<div class="col-sm-6">
											 <?php echo Form::select('operation', [null => '- Operasi -']+['Sum','Count'], null, ['class' => 'show-tick form-control','required'=>'required']); ?>

									 </div>
							 </div>
							 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Grafik <span class="required">*</span></label>
									 <div class="col-sm-6">
											<?php echo Form::select('graph', [null => '- Grafik -']+['Tampil','Tidak'], null, ['class' => 'show-tick form-control','required'=>'required']); ?>

									</div>
							</div>




								 	<input type='hidden' name="id_master" value="<?php echo e($id_master); ?>">
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
