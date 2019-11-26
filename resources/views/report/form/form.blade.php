								  <div class="item form-group">

												<label class="control-label col-sm-3" for="name">Name <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															{!! Form::text('name', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'name','placeholder'=>'Name','required'=>'required'),'') !!}

														</div>
												</div>

									</div>

									<div class="item form-group">

												<label class="control-label col-sm-3" for="name">Price <span class="required">*</span></label>

										<div class="col-sm-6">

														<div class="form-line">
															{!! Form::number('price', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'price','placeholder'=>'0','required'=>'required'),'') !!}

														</div>
												</div>

									</div>

									<div class="item form-group">
									<label class="control-label col-sm-3" for="notes">Notes <span class="required">*</span></label>
									<div class="col-sm-6">

													<div class="form-line">
														{!! Form::textarea('notes', null,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'notes','placeholder'=>'Notes','required'=>'required'),'') !!}

													</div>

									</div>
								  </div>


								 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit <span class="required">*</span></label>
								 <div class="col-sm-6">

												 <div class="form-line">

															@if (Request::is('products/*/edit'))
																@php
																			$select=1;
																			$unit_id=$products->unit_id;
																@endphp
															@else
																@php
																			$disable=0;
																			$unit_id=0;
																@endphp
														 @endif

															<select name='unit_id' class="form-control show-tick">
																  @foreach($product_unit as $key=> $product_unit)
																		<option @if ($unit_id==$product_unit->id) selected @endif value='{{$product_unit->id}}'>{{$product_unit->name}}</option>
																	@endforeach
															</select>
												 </div>

								 </div>
								</div>











									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">

											  		@if (Request::is('products/*/edit'))

														{{ Form::button('<span class="glyphicon glyphicon-edit"></span> '.$submit_text, array('class'=>'btn btn-info', 'type'=>'submit')) }}
													@else
														{{ Form::button('<span class="glyphicon glyphicon-plus"></span> '.$submit_text, array('class'=>'btn btn-success', 'type'=>'submit')) }}

													@endif
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
