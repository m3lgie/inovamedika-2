<div class="item form-group ">



	<div class="col-sm-8 ">
	<label class="control-label col-sm-12 " for="name">Item Order <span class="required"> </span></label>

	<table class="table table-striped table-hover">
			<thead>
					<tr>
						<th>#</th>
						<th>Name Item</th>
						<th>Price</th>
						<th width="10%">Disc %</th>
						<th width="10%">Qty</th>
						<th>Subtotal</th>


					</tr>
			</thead>

			</tfoot>
			<tbody id='order'>
				@php
				$i=1;
				$subtotal=0;
				$total=0;
				$totaldisc=0;
				@endphp
    @foreach( $draft_transaction_details as $product)

						<tr>
							<td>{{$i}} {!! Form::hidden('id', $product->id,array('class' => 'form-control','name'=>'id[]','required'=>'required'),'') !!}</td>
							<td>{{$product->name}}</td>
							<td>{{Konversi::rupiah($product->price)}}</td>
							<td>{{$product->disc}}
							</td>
							<td>{{$product->qty}}
							</td>
							<td>{{Konversi::rupiah($product->price*$product->qty)}}</td>

					</tr>
					@php
					$subtotal+=$product->price*$product->qty;
					$totaldisc+=$product->price*$product->disc/100;
					$i++;
					@endphp
		@endforeach
					@php

					$total=$subtotal-$totaldisc;

					@endphp
				<tr><td colspan="4">Subtotal</td><td>:</td><td colspan="2">{{Konversi::rupiah($subtotal)}}</td></tr>
				<tr><td colspan="4">Total Disc</td><td>:</td><td colspan="2">{{Konversi::rupiah($totaldisc)}}</td></tr>
				<tr><td colspan="4">Total</td><td>:</td><td colspan="2">{{Konversi::rupiah($total)}}
</td></tr>

			</tbody>
	</table>
		</div>

		<div class="col-sm-4">
		<label class="control-label col-sm-12" for="name">Order Details</label>



									<label class="control-label col-sm-12" for="name">Name Customers </label>
									<br>
									<label class="control-label col-sm-12" for="name">{{$draft_transactions[0]->customer_name}} </label>


									<br>


									<label class="control-label col-sm-12" for="name">Phone </label>
									<br>
									<label class="control-label col-sm-12" for="name">{{$draft_transactions[0]->customer_phone}} </label>





									<br>
									<label class="control-label col-sm-12" for="name">Payment </label>
									<br>
									<label class="control-label col-sm-12" for="name">{{Konversi::rupiah($draft_transactions[0]->payment)}} </label>


									<br>
									<label class="control-label col-sm-12" for="name">Total </label>
									<br>
									<label class="control-label col-sm-12" for="name">{{Konversi::rupiah($total)}}  </label>
									<br>
									<label class="control-label col-sm-12" for="name">Notes </label>
									<br>
									<label class="control-label col-sm-12" for="name">{{$draft_transactions[0]->notes}} </label>

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
