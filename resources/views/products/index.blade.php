



@extends('layouts/app')

@section('content')



          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
          @endif
          <!-- Single button -->


                    <a href="{{URL::route('products.create')}}" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Add Data
                  </a>

                  <p>


                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Unit</th>
                                      <th>Harga</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Unit</th>
                                      <th>Harga</th>
                                      <th>Notes</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach( $products as $products )

                                          <tr class="grade{{ $products->id }}">
                                          {!! Form::open(array('class' => 'form-inline delete_form', 'method' => 'DELETE', 'route' => array('products.destroy', $products->id))) !!}
                                           <td>

                                             <a href="{{URL::route('products.show', array($products->id))}}" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   {{ $products->id }}
                                             </a>

                                           </td>
                                          <td>{{ $products->name }}</td>
                                          <td>{{ Konversi::unit($products->unit_id) }}</td>
                                          <td>{{ $products->price }}</td>
                                          <td>{{ $products->notes}}</td>


                                           <td>
                                             <a href="{{URL::route('products.edit', array($products->id))}}" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
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
