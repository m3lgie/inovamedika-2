@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model(new App\Master, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['products.store']]) !!}

        		@include('products/form/form', ['submit_text' => 'Tambah Data'])
    			{!! Form::close() !!}





@endsection
