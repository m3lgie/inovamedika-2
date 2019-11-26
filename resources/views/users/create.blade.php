@extends('layouts/app')


@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model(new App\Users, ['class' => 'form-horizontal','novalidate','files'=>true,'route' => ['users.store']]) !!}

        		@include('users/form/form', ['submit_text' => 'Tambah Data'])
    			{!! Form::close() !!}






@endsection
