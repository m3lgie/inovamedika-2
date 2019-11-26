								  <div class="item form-group">

												<label class="control-label col-sm-3" for="name">Name <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															<?php echo Form::text('name', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'name','placeholder'=>'Nama','required'=>'required'),''); ?>


														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="notes">Notes <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::textarea('notes', null,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'notes','placeholder'=>'Notes','required'=>'required'),''); ?>


													</div>

									</div>
								  </div>





									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		<?php if(Request::is('opd/*/edit')): ?>

														<?php echo e(Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit'))); ?>

													<?php else: ?>
														<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


													<?php endif; ?>
										</div>
									</div>

</form>
