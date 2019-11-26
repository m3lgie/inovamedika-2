@extends('layouts/app')

@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

    			{!! Form::model($tb_opd, ['method' => 'PATCH', 'route' => ['opd.update', $tb_opd->id],'class' => 'form-horizontal','files' => true]) !!}

       			 @include('opd/form/form', ['submit_text' => 'Edit Data Kabupaten'])
   				 {!! Form::close() !!}


@endsection
