<style media="screen">
.table {
 margin: auto;
 width: 50% !important;
 font-size: 10px;
}
</style>



    <link href="{{asset('template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<div class="item form-group">
		<div class="col-sm-12">
		<center> <h3> Laporan Penjualan </h3>
		<h4> Periode {{$start}} s/d {{$end}}</h4></center>
		</div>
</div>

<div class="row justify-content-center">
<div class="col-sm-12">

	<table class="table table-bordered table-striped table-hover">
			<thead>
					<tr>
						<th>Id</th>
						<th>No Invoice</th>
						<th>Date</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Total</th>
						<th>payment</th>
						<th>Status</th>

					</tr>
			</thead>

			<tbody>
				@php
				$i=0;
				$subtotal=0;
				$total=0;
				$totaldisc=0;
				@endphp
				@foreach( $transactions as $transactions )

								<tr class="grade{{ $transactions->id }}">
								 <td>


												 {{ $i+1 }}


								 </td>
								<td>{{ $transactions->invoice_no }}</td>
								<td>{{ $transactions->date }}</td>
								<td>{{ $transactions->customer_name }}</td>
								<td>{{ $transactions->customer_phone }}</td>
								<td>{{ Konversi::rupiah($transactions->total) }}</td>
								<td>{{ Konversi::rupiah($transactions->payment) }}</td>
								<td> {{Konversi::status($transactions->status)}}</td>



			</tr>
			@php
			$total+=$transactions->total;
			$i++;
			@endphp
			 @endforeach

			 <tr><td colspan="6"><h5>Total Transaksi</h5></td><td colspan="2"><h5>{{Konversi::rupiah($total)}}</h5></td></tr>
			 <tr><td colspan="6"><h5>Total Transaksi</h5></td><td colspan="2"><h5>{{$i}}</h5></td></tr>
			</tbody>
	</table>


</div>
