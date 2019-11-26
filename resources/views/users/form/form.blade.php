



									<div class="item form-group">

												<label class="control-label col-sm-3" for="name">Nama <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															{!! Form::text('name', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'name','placeholder'=>'Nama','required'=>'required'),'') !!}

														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Email <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														{!! Form::text('email', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'email','placeholder'=>'Email','required'=>'required'),'') !!}

													</div>

									</div>
									</div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Username <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														@if (Request::is('users/*/edit') or Request::is('profile/*'))

															{!! Form::text('username', $users->username,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'username','readonly'=>'true','required'=>'required'),'') !!}
														@else
															{!! Form::text('username', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'username','placeholder'=>'Username','required'=>'required'),'') !!}

														@endif
													</div>

									</div>
									</div>
									<div class="item form-group">
									<label class="control-label col-sm-3" for="keterangan">Password <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														{{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) }}

												</div>

									</div>
									</div>
									<div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Level <span class="required">*</span></label>
										 <div class="col-sm-6">
												{!! Form::select('level',  [null => '- Level -']+['Super Admin','Administrator','Operator','OPD'], null, ['id' => 'level','class' => 'show-tick form-control','required'=>'required']) !!}
										</div>
								</div>
									<div class="item form-group">

								

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar <span class="required">*</span>
										</label>
									<div class="col-md-8">
											 {!! Form::file('gambar',['class' => 'btn btn-default btn-file']) !!}
											 @if (Request::is('users/*/edit') or Request::is('profile/*'))

														{!! Html::image($users->gambar,'', array('width' => '80%', 'height' => '50%')) !!}

											@endif
										<p class="errors">{!!$errors->first('file')!!}</p>
									@if(Session::has('error'))
									<p class="errors">{!! Session::get('error') !!}</p>
									@endif
									</div>
									</div>



								 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span></label>
								 <div class="col-sm-6">


													 {!! Form::select('status', ['Active','Non Active'], null, ['class' => 'show-tick form-control']) !!}



								 </div>
								</div>



									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

														@if (Request::is('user/*/edit'))

														{{ Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit')) }}
													@else
														{{ Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit')) }}

													@endif
										</div>
									</div>

</form>



</form>
