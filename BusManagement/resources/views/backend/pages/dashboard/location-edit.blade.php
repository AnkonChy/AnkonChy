@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <h1 class="text-center">Create Location</h1>
  <div style="width:500px; margin:0px auto;">
    <form action="{{ route('location.update.now') }}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{ $location->id }}">
      <div class="mb-3">
        <label for="placeName" class="form-label">Place Name *</label>
        <input type="text" class="form-control" name="placeName" value="{{ $location->place_name }}" id="placeName" placeholder="place name..." required>
      </div>
      <div class="mb-3">
        <label for="distance" class="form-label">Distance in KM *</label>
        <input type="number" class="form-control" name="distance" value="{{ $location->distance_km }}" id="distance" placeholder="distance in km..." required>
      </div>
      <div class="mb-3">
        <label for="stopageOrder" class="form-label">Stopage Order *</label>
        <input type="number" class="form-control" name="stopageOrder" value="{{ $location->stopage_order }}" id="stopageOrder" placeholder="stopage order..." required>
      </div>
      <button type="submit" class="btn btn-primary">Location Update</button>
    </form>
  </div>
@endsection