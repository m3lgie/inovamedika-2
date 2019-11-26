



@extends('layouts/app')

@section('content')



          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
          @endif
          <!-- Single button -->


                  <a href="{{URL::route('users.create')}}" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Tambah Data
                  </a>
      <p>

					      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                          <thead>
		                            <tr>
																	<th>Id</th>
																	<th>Nama</th>
																  <th>Username</th>
                                  <th>Level</th>
                                  <th>Status</th>
																	<th>Action</th>
		                            </tr>
		                          </thead>
                              <tfoot>
                               <tr>
                                 <th>Id</th>
                                 <th>Nama</th>
                                <th>Username</th>
                                  <th>Level</th>
                                  <th>Status</th>
                                 <th>Action</th>
                               </tr>
                             </tfoot>
		                          <tbody>
																@foreach( $users as $users )
									                    	<tr class="grade{{ $users->id }}">
									 					            {!! Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('users.destroy', $users->id))) !!}
                                        <td>

                                            <a href="{{URL::route('users.show', array($users->id))}}" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                  {{ $users->id }}
                                            </a>

                                          </td>

									 						          <td>{{ $users->name }}</td>

                                        <td>{{ $users->username}}</td>
                                        <td>{{ Konversi::level($users->level)}}</td>
                                        <td>{{ Konversi::status_user($users->status)}}</td>


									                       <td>
                                           <a href="{{URL::route('users.edit', array($users->id))}}" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                                                <span class="glyphicon glyphicon-edit"></span>
                                           </a>
                                           @if(Auth::user()->level == '0')
                                             {{ Form::button('<span class="glyphicon glyphicon-trash"></span> ', array('class'=>'btn btn-danger','onclick'=>'ConfirmMessage()','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete Data')) }}

                                          @endif
                                        </td>
                                      {!! Form::close() !!}
									 						</tr>
									             @endforeach
		                          </tbody>
		                        </table>

@endsection
