@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <h1 class="text-center">Create Location</h1>
  <div style="width:500px; margin:0px auto;">
    <form action="{{ route('location.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="placeName" class="form-label">Place Name *</label>
        <input type="text" class="form-control" name="placeName" id="placeName" placeholder="place name..." required>
      </div>
      <div class="mb-3">
        <label for="distancekm" class="form-label">Distance in KM *</label>
        <input type="number" class="form-control" name="distancekm" id="distancekm" placeholder="distance in km..." required>
      </div>
      <div class="mb-3">
        <label for="stopageOrder" class="form-label">Stopage Order *</label>
        <input type="number" class="form-control" name="stopageOrder" id="stopageOrder" placeholder="stopage order..." required>
      </div>
      <button type="submit" class="btn btn-primary">Location Create</button>
    </form>
  </div>
@endsection