



@extends('layouts/app')

@section('content')



          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
          @endif
          <!-- Single button -->


                    <a href="{{URL::route('product_unit.create')}}" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Add Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach( $product_unit as $product_unit )

                                          <tr class="grade{{ $product_unit->id }}">
                                          {!! Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('product_unit.destroy', $product_unit->id))) !!}
                                         <td>

                                           {{ $product_unit->id }}
                                           </td>
                                          <td>{{ $product_unit->name }}</td>
                                          <td>{{ $product_unit->notes}}</td>

                                           <td>
                                             <a href="{{URL::route('product_unit.edit', array($product_unit->id))}}" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
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
