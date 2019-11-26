@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model($products, ['method' => 'PATCH', 'route' => ['products.update', $products->id],'class' => 'form-horizontal','files' => true]) !!}

       			 @include('products/form/form', ['submit_text' => 'Edit Data Product'])
   				 {!! Form::close() !!}


@endsection
