@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model($transactions, ['method' => 'PATCH', 'route' => ['transactions.update', $transactions->id],'class' => 'form-horizontal','files' => true]) !!}

       			 @include('transactions/form/form', ['submit_text' => 'Edit Data Product'])
   				 {!! Form::close() !!}


@endsection
