@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif


				<div class="item form-group ">

						<div class="col-sm-12 ">
								<h5>InvoiceNo : {{$transactions->invoice_no}}</h5><br>
								Status : {{Konversi::status($transactions->status)}}
						</div>

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
				    @foreach( $transaction_details as $product)

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
													<label class="control-label col-sm-12" for="name">{{$transactions->customer_name}}</label>


													<br>


													<label class="control-label col-sm-12" for="name">Phone </label>
													<br>
													<label class="control-label col-sm-12" for="name">{{$transactions->customer_phone}} </label>





													<br>
													<label class="control-label col-sm-12" for="name">Payment </label>
													<br>
													<label class="control-label col-sm-12" for="name">{{Konversi::rupiah($transactions->payment)}} </label>


													<br>
													<label class="control-label col-sm-12" for="name">Total </label>
													<br>
													<label class="control-label col-sm-12" for="name">{{Konversi::rupiah($total)}} </label>
													<br>
													<label class="control-label col-sm-12" for="name">Notes </label>
													<br>
													<label class="control-label col-sm-12" for="name">{{$transactions->notes}} </label>



							</div>

				</div>


    			{!! Form::model($transactions, ['method' => 'PATCH', 'route' => ['transactions.update', $transactions->id],'class' => 'form-horizontal','files' => true]) !!}

       			 @include('transactions/form/form_edit', ['submit_text' => 'Edit Data Transactions'])
   				 {!! Form::close() !!}


@endsection
