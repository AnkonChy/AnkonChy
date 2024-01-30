@extends('backend.layout.app')
@section('content')
    <!--start breadcrumb-->
    <h1 class="text-center">Create Location</h1>
    <div style="width:500px; margin:0px auto;">
        <form action="{{ route('trip.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="bus_id" class="form-label">Bus No. *</label>
                <select name="bus_id" class="form-select" aria-label="Default select example" required>
                    <option disabled selected>Select one</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->bus_no }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="trip_date" class="form-label">Trip Date *</label>
                <input type="date" class="form-control" name="trip_date" id="trip_date" required>
            </div>
            <div class="mb-3">
                <label for="trip_time" class="form-label">Trip Time *</label>
                <select name="trip_time" class="form-select" aria-label="Default select example" required>
                    <option disabled selected>Select one</option>
                    <option value="07:00 AM">07:00 AM</option>
                    <option value="08:00 AM">08:00 AM</option>
                    <option value="09:00 AM">09:00 AM</option>
                    <option value="07:00 PM">07:00 PM</option>
                    <option value="08:00 PM">08:00 PM</option>
                    <option value="09:00 PM">09:00 PM</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="start_from" class="form-label">Start From *</label>
                <select name="start_from" class="form-select" aria-label="Default select example" required>
                    <option disabled selected>Select one</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">End To *</label>
                <select name="destination" class="form-select" aria-label="Default select example" required>
                    <option disabled selected>Select one</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Trip</button>
        </form>
    </div>
@endsection
