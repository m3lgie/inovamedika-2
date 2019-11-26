@extends('layouts.app')
@section('content')
      <div class="container-fluid">
{{Auth::user()->id}}
<table class="table table-hover">
  <thead>
      <tr>
          <th>ID</th>
          <th>: {{$users->id }}</th>
      </tr>
  </thead>
    <tbody >
        <tr>
            <td><label>Nama</label></td>
            <td>: {{$users->name}}</label></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td>: {{$users->email }}</label></td>
        </tr>
        <tr>
            <td><label>Username</label></td>
            <td>: {{$users->username }}</td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td>: {{$users->password }}</td>
        </tr>
        <tr>
            <td><label>Level</label></td>
            <td>: {{ Konversi::level($users->level)}}</td>
        </tr>
        <tr>
            <td><label>OPD</label></td>
            <td>: {{ ($tb_opd->nama)}}</td>
        </tr>
        <tr>
            <td><label>Kabupaten</label></td>
            <td>: {{ ($tb_kabupaten->kabupaten)}}</td>
        </tr>

        <tr>
            <td><label>Status</label></td>
            <td>: {{ Konversi::status($users->status)}}</td>
        </tr>

        <tr>
            <td><label>Created By</label></td>
            <td>: {{ Konversi::user($users->created_by)}} </td>
        </tr>
        <tr>
            <td><label>Updated By</label></td>
            <td>: {{ Konversi::user($users->updated_by)}} </td>
        </tr>
        <tr>
            <td><label>Created At</label></td>
            <td>: {{$users->created_at }}</td>
        </tr>
        <tr>
            <td><label>Updated At</label></td>
            <td>: {{$users->updated_at }}</td>
        </tr>
    </tbody>
</table>

<a href="{{URL::route('users.show', array($users->id_master))}}" class="btn btn-success">
   <span class="glyphicon glyphicon-chevron-left"></span> Back
</a>
@endsection
