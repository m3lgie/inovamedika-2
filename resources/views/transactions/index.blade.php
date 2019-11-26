



@extends('layouts/app')

@section('content')



          @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
          @endif
          <!-- Single button -->


                    <a href="{{URL::route('transactions.create')}}" class="btn btn-success">
                       <span class="glyphicon glyphicon-plus"></span> Add Oder
                  </a>

                  <p>

                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>No Invoice</th>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Total</th>
                                      <th>payment</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>No Invoice</th>
                                      <th>Date</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Total</th>
                                      <th>payment</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach( $transactions as $transactions )

                                          <tr class="grade{{ $transactions->id }}">
                                           <td>

                                             <a href="{{URL::route('transactions.show', array($transactions->id))}}" data-toggle="tooltip" data-placement="right" title="click to details" >
                                                   {{ $transactions->id }}
                                             </a>

                                           </td>
                                          <td>{{ $transactions->invoice_no }}</td>
                                          <td>{{ $transactions->date }}</td>
                                          <td>{{ $transactions->customer_name }}</td>
                                          <td>{{ $transactions->customer_phone }}</td>
                                          <td>{{ Konversi::rupiah($transactions->total) }}</td>
                                          <td>{{ Konversi::rupiah($transactions->payment) }}</td>
                                          <td> {{Konversi::status($transactions->status)}}</td>

                                           <td>
                                             <a href="{{URL::route('transactions.edit', array($transactions->id))}}" data-toggle="tooltip" data-placement="top" title="Update Data" class="btn btn-info">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                             </a>

                                          </td>

                                </tr>
                                 @endforeach
                                </tbody>
                            </table>



@endsection
