@extends('layout')

@section('content')
<h1><small>Welcome {{ Auth::user()->username }} to the admin page!</small></h1>

  <table class="table table-striped table-bordered">
      <thead>
      <td>Category</td>
      <td>Action</td>
      </thead>
      <tbody>
          <tr>
              <td>Medicine</td><td>
                  <a class="btn btn-small btn-success" href="{{ URL::to('medicine') }}">View</a>
                  <a class="btn btn-small btn-info" href="{{ URL::to('medicine', 'create' ) }}">Create</a>
              
              </td>
          </tr>
          <tr>
              <td>Patients</td><td>
                  <a class="btn btn-small btn-success" href="{{ URL::to('patients' ) }}">View</a>
                  <a class="btn btn-small btn-info" href="{{ URL::to('patients', 'create' ) }}">Create</a>
              
              </td>
          </tr>
          <tr>
              <td>Users</td><td>
                  <a class="btn btn-small btn-success" href="{{ URL::to('users') }}">View</a>
                  <a class="btn btn-small btn-info" href="{{ URL::to('users', 'create' ) }}">Create</a>
              
              </td>
          </tr>
      </tbody>
  </table>
@stop