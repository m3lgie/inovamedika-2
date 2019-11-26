@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model($product_unit, ['method' => 'PATCH', 'route' => ['product_unit.update', $product_unit->id],'class' => 'form-horizontal','files' => true]) !!}

       			 @include('product_unit/form/form', ['submit_text' => 'Edit Data Product Unit'])
   				 {!! Form::close() !!}


@endsection
