



@extends('layouts/app')

@section('content')



          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
          @endif
          <!-- Single button -->


                    <a href="{{URL::route('opd.create')}}" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Tambah Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Alamat</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Nama</th>
                                      <th>Alamat</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach( $tb_opd as $tb_opd )

                                          <tr class="grade{{ $tb_opd->id }}">
                                          {!! Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('opd.destroy', $tb_opd->id))) !!}
                                         <td>

                                             <a href="{{URL::route('opd.show', array($tb_opd->id))}}" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   {{ $tb_opd->id }}
                                             </a>

                                           </td>
                                          <td>{{ $tb_opd->nama }}</td>
                                          <td>{{ $tb_opd->alamat}}</td>

                                           <td>
                                             <a href="{{URL::route('opd.edit', array($tb_opd->id))}}" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                             </a>
                                             {{ Form::button('<span class="glyphicon glyphicon-trash"></span> ', array('class'=>'btn btn-danger','onclick'=>'ConfirmMessage()','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Delete Data')) }}

                                          </td>
                                      {!! Form::close() !!}
                                </tr>
                                 @endforeach
                                </tbody>
                            </table>

@endsection
