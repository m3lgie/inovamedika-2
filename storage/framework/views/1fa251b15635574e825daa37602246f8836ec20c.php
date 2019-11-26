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
										<label class="control-label col-sm-3" for="satuan">Table Master <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">

																<?php if(Request::is('view/*/edit')): ?>
																	<?php 

																				$id_master=$tb_view->id_master;
																	 ?>
																<?php else: ?>
																	<?php 

																				$id_master=0;
																	 ?>
															 <?php endif; ?>

																<?php echo Form::select('id_master', $master, $id_master, array('id' => 'master','class' => 'form-control show-tick','name'=>'id_master','data-live-search'=>'true','data-live-search'=>'true')); ?>


															</div>

											</div>
									</div>

									<div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Inputan <span class="required">*</span></label>
										 <div class="col-sm-6">
												<?php echo Form::select('tipe_view',  [null => '- Tipe View -']+['Tahun Laporan','5 Tahunan'], null, ['id' => 'tipe_view','class' => 'show-tick form-control','onchange' => 'inputanOnChange()','required'=>'required']); ?>

										</div>
								</div>


									<div id="tahun-select" class="item form-group">
										<label class="control-label col-sm-3" for="satuan">Tahun <span class="required">*</span></label>
											<div class="col-sm-6">

															<div class="form-line">

																<?php if(Request::is('view/*/edit')): ?>
																	<?php 
																				$id_tahun=$tb_view->id_tahun;
																	 ?>
																<?php else: ?>
																	<?php 
																				$id_tahun=0;
																	 ?>
															 <?php endif; ?>

																<?php echo Form::select('id_tahun', $tahun, $id_tahun, array('id' => 'tahun','class' => 'form-control show-tick','name'=>'id_tahun','data-live-search'=>'true','data-live-search'=>'true')); ?>


															</div>

											</div>
									</div>

										<div class="item form-group">
										 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish <span class="required">*</span></label>
											 <div class="col-sm-6">
													<?php echo Form::select('publish',  [null => '- Publish -']+['Internal','External','Public'], 2, ['id' => 'publish','class' => 'show-tick form-control','onchange' => 'inputanOnChange()','required'=>'required']); ?>

											</div>
									</div>
									<div class="item form-group">
 								 		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Dasboard <span class="required">*</span></label>
 								 <div class="col-sm-6">


 													 <?php echo Form::select('dasboard', ['Ya','Tidak'], 1, ['class' => 'show-tick form-control']); ?>




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

<script>
$('#tahun-select').hide();


    		$(document).ready();
				function inputanOnChange() {

					var tipe_view = document.getElementById('tipe_view').value;
					if (tipe_view == '0') {

						 	$('#tahun-select').show();
							$("#tahun").prop("required", true);
		 		 }
				 else {

						  $('#tahun-select').hide();

							$("#tahun").prop("required", false);

		 		 }
        }
</script>
