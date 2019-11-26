



									<div class="item form-group">

												<label class="control-label col-sm-3" for="name">Nama <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															<?php echo Form::text('name', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'name','placeholder'=>'Nama','required'=>'required'),''); ?>


														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Email <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::text('email', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'email','placeholder'=>'Email','required'=>'required'),''); ?>


													</div>

									</div>
									</div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Username <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php if(Request::is('users/*/edit') or Request::is('profile/*')): ?>

															<?php echo Form::text('username', $users->username,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'username','readonly'=>'true','required'=>'required'),''); ?>

														<?php else: ?>
															<?php echo Form::text('username', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'username','placeholder'=>'Username','required'=>'required'),''); ?>


														<?php endif; ?>
													</div>

									</div>
									</div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Password <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo e(Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) )); ?>


												</div>

									</div>
									</div>
									<div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Level <span class="required">*</span></label>
										 <div class="col-sm-6">
												<?php echo Form::select('level',  [null => '- Level -']+['Super Admin','Administrator','Operator','OPD'], null, ['id' => 'level','class' => 'show-tick form-control','required'=>'required']); ?>

										</div>
								</div>
									<div class="item form-group">
										<label class="control-label col-sm-3" for="satuan">OPD <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">

																<?php if(Request::is('user/*/edit')): ?>
																	<?php 

																				$id_opd=$tb_opd->id_opd;
																	 ?>
																<?php else: ?>
																	<?php 

																				$id_opd=0;
																	 ?>
															 <?php endif; ?>

																<?php echo Form::select('id_opd', $opd, $id_opd, array('id' => 'opd','class' => 'form-control show-tick','name'=>'id_opd','data-live-search'=>'true','data-live-search'=>'true')); ?>


															</div>

											</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-sm-3" for="satuan">Kabupaten <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">

																<?php if(Request::is('user/*/edit')): ?>
																	<?php 

																				$id_kabupaten=$id_kabupaten->id_kabupaten;
																	 ?>
																<?php else: ?>
																	<?php 

																				$id_kabupaten=0;
																	 ?>
															 <?php endif; ?>

																<?php echo Form::select('id_kabupaten', $kabupaten, $id_kabupaten, array('id' => 'kabupaten','class' => 'form-control show-tick','name'=>'id_kabupaten','data-live-search'=>'true','data-live-search'=>'true')); ?>


															</div>

											</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar <span class="required">*</span>
										</label>
									<div class="col-md-8">
											 <?php echo Form::file('gambar',['class' => 'btn btn-default btn-file']); ?>

											 <?php if(Request::is('users/*/edit') or Request::is('profile/*')): ?>

														<?php echo Html::image($users->gambar,'', array('width' => '80%', 'height' => '50%')); ?>


											<?php endif; ?>
										<p class="errors"><?php echo $errors->first('file'); ?></p>
									<?php if(Session::has('error')): ?>
									<p class="errors"><?php echo Session::get('error'); ?></p>
									<?php endif; ?>
									</div>
									</div>



								 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span></label>
								 <div class="col-sm-6">


													 <?php echo Form::select('status', ['Active','Non Active'], null, ['class' => 'show-tick form-control']); ?>




								 </div>
								</div>



									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

														<?php if(Request::is('user/*/edit')): ?>

														<?php echo e(Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit'))); ?>

													<?php else: ?>
														<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


													<?php endif; ?>
										</div>
									</div>

</form>



</form>
