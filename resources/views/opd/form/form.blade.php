								  <div class="item form-group">

												<label class="control-label col-sm-3" for="name">Nama <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															{!! Form::text('nama', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'nama','placeholder'=>'Nama','required'=>'required'),'') !!}

														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="alamat">Alamat <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														{!! Form::textarea('alamat', null,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'alamat','placeholder'=>'Alamat','required'=>'required'),'') !!}

													</div>

									</div>
								  </div>





									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		@if (Request::is('opd/*/edit'))

														{{ Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit')) }}
													@else
														{{ Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit')) }}

													@endif
										</div>
									</div>

</form>
