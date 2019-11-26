@extends('layouts.app')
@section('content')
      <div class="container-fluid">


<table class="table table-hover">
  <thead>
      <tr>
          <th>ID</th>
          <th>: {{$tb_opd->id }}</th>
      </tr>
  </thead>
    <tbody >
        <tr>
            <td><label>Nama</label></td>
            <td>: {{$tb_opd->nama }}</label></td>
        </tr>
        <tr>
            <td><label>Alamat</label></td>
            <td>: {{$tb_opd->alamat }}</td>
        </tr>

        <tr>
            <td><label>Created By</label></td>
            <td>: {{$tb_opd->created_by }}</td>
        </tr>
        <tr>
            <td><label>Updated By</label></td>
            <td>: {{$tb_opd->updated_by }}</td>
        </tr>
        <tr>
            <td><label>Created At</label></td>
            <td>: {{$tb_opd->created_at }}</td>
        </tr>
        <tr>
            <td><label>Updated At</label></td>
            <td>: {{$tb_opd->updated_at }}</td>
        </tr>
    </tbody>
</table>
<a href="{{URL::route('opd.index')}}" class="btn btn-success">
   <span class="glyphicon glyphicon-chevron-left"></span> Back
</a>
@endsection
