@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif



			

    			{!! Form::model(new App\Transactions, ['id' => 'form_validation','class' => 'form-horizontal','files'=>true,'route' => ['transactions.save', $draft_transactions[0]->id]]) !!}

        		@include('drafttransactions/form/show', ['submit_text' => 'Simpan Transaction'])
    			{!! Form::close() !!}





@endsection
