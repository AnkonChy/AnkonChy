@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <div class="positon-relative">
    <div class="d-flex">
      <h1>Lacation Data</h1>
      <div class="position-absolute end-0 me-4">
        <a class="btn btn-primary" href="{{ route('location.create') }}">Add New</a>
      </div>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">SL</th>
        <th scope="col">Place Name</th>
        <th scope="col">Distance In KM</th>
        <th scope="col">Stopage Order</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($locations as $location)
        <tr>
          <th scope="col">{{ $loop->iteration }}</th>
          <td scope="col">{{ $location->place_name }}</td>
          <td scope="col">{{ $location->distance_km }}</td>
          <td scope="col">{{ $location->stopage_order }}</td>
          <td scope="col">{{ $location->created_at }}</td>
          <td scope="col">
            <a href="{{ route('location.edit',$location->id) }}" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection