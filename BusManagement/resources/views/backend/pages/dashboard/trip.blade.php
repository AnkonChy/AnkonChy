@extends('backend.layout.app')
@section('content')
    <!--start breadcrumb-->
    <div class="positon-relative">
        <div class="d-flex">
            <h1>Product Data</h1>
            <div class="position-absolute end-0 me-4">
                <a class="btn btn-primary" href="{{ route('trip.create') }}">Add New</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Bus No</th>
                <th scope="col">Trip Date</th>
                <th scope="col">Trip Time</th>
                <th scope="col">Start From</th>
                <th scope="col">Destination</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($trips as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->bus_no }}</td>
                <td>{{ $item->trip_date }}</td>
                <td>{{ $item->trip_time }}</td>
                <td>{{ $item->start_from }}</td>
                <td>{{ $item->destination }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('trip.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    {{-- <a href="{{ route('trip.delete', $item->id) }}" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
