@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <div class="positon-relative">
    <div class="d-flex">
      <h1>Product Data</h1>
      <div class="position-absolute end-0 me-4">
        <a class="btn btn-primary" href="{{ route('bus.create') }}">Add New</a>
      </div>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">SL</th>
        <th scope="col">Bus No</th>
        <th scope="col">Supervisor Name</th>
        <th scope="col">Supervisor Phone Number</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bus as $item)
        <tr>
          <th scope="col">{{ $loop->iteration }}</th>
          <td scope="col">{{ $item->bus_no }}</td>
          <td scope="col">{{ $item->supervisor_name }}</td>
          <td scope="col">{{ $item->supervisor_number }}</td>
          <td scope="col">{{ $item->created_at }}</td>
          <td scope="col">
            <a href="{{ route('bus.edit',$item->id) }}" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection