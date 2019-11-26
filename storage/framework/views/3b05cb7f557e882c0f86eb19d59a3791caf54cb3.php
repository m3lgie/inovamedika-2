								  <div class="item form-group">

												<label class="control-label col-sm-3" for="name">Pembatanan Pesanan <span class="required">*</span></label>

												<div class="col-sm-6">


		 														 <?php echo Form::select('pembatalan', ['No','Yes'], null, ['class' => 'show-tick form-control']); ?>




		 									 </div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="payment">Payment <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::hidden('total', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'total','required'=>'required'),''); ?>


														<?php echo Form::number('payment', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'payment','required'=>'required'),''); ?>


													</div>

									</div>
								  </div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Notes <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														<?php echo Form::textarea('notes', null,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'notes','placeholder'=>'Keterangan','required'=>'required'),''); ?>


													</div>

									</div>
									</div>






									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		<?php if(Request::is('tahun/*/edit')): ?>

														<?php echo e(Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit'))); ?>

													<?php else: ?>
														<?php echo e(Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit'))); ?>


													<?php endif; ?>
										</div>
									</div>

</form>
