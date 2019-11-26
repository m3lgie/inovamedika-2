<div class="panel-body table-responsive">
    <table class="table table-condensed">
        <thead>
            <tr>
								<th>ID</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Price</th>
								<th>Qty</th>

            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
						<tr class="grade{{ $product->id }}">

								<td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Konversi::unit($product->unit_id) }}</td>
                <td>{{ $product->price }}</td>

								<td>
									{!! Form::open(array('id' => $product->id,'class' => 'form-inline delete_form', 'method' => 'POST', 'route' => array('draft_transactions.add_item', $product->id))) !!}

									{!! Form::number('qty', null,array('class' => 'form-control','name'=>'qty','required'=>'required'),'') !!}
									{!! Form::hidden('id_product', $product->id,array('class' => 'form-control','row' => '3','data-validate-length-range'=>'5','name'=>'id_product','id'=>'id_product','required'=>'required'),'') !!}
							    {{ Form::button('<span class="glyphicon glyphicon-plus"></span> Add Item', array('class'=>'btn btn-success', 'type'=>'submit')) }}

									{!! Form::close() !!}


							 </td>

            </tr>
            @empty
            <tr>
                <td colspan="3">
                    Produk tidak ditemukan dengan keyword : <strong><em>{{ request('query') }}</em></strong>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
	</div>

	{!! Form::model(new App\Master, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['transactions.store']]) !!}


	{!! Form::close() !!}
