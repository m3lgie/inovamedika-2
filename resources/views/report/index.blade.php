@extends('layouts/app')


@section('content')

				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif


{!! Form::model(new App\transactions, ['class' => 'form-horizontal','novalidate','files'=>true,'route' => ['report.find']]) !!}





<div class="col-sm-12">
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-line">
              Tgl Mulai
              {!! Form::text('start', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'start','placeholder'=>'YYYY-mm-dd','required'=>'required'),'') !!}

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-line">
              Tanggal Akhir
              {!! Form::text('end', null,array('class' => 'form-control','data-validate-length-range'=>'5','name'=>'end','placeholder'=>'YYYY-mm-dd','required'=>'required'),'') !!}

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">


                        {{ Form::button('<span class="glyphicon glyphicon-plus"></span> '.'Prosses', array('class'=>'btn btn-success', 'type'=>'submit')) }}

        </div>
    </div>
</div>


{!! Form::close() !!}








@endsection
