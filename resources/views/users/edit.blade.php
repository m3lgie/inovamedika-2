@extends('layouts/app')


@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif

				@if ( Request::is('profile/*'))
					{!! Form::model($users, ['method' => 'PATCH', 'route' => ['users.update_profile', $users->id],'class' => 'form-horizontal','files' => true]) !!}
 			@else
				 {!! Form::model($users, ['method' => 'PATCH', 'route' => ['users.update', $users->id],'class' => 'form-horizontal','files' => true]) !!}

			 @endif

       			 @include('users/form/form', ['submit_text' => 'Edit Data Users'])
   				 {!! Form::close() !!}


@endsection
