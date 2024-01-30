@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <h1 class="text-center">Create Location</h1>
  <div style="width:500px; margin:0px auto;">
    <form action="{{ route('bus.update',$businfo->id) }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="busNo" class="form-label">Bus No. *</label>
        <input type="number" class="form-control" value="{{ $businfo->bus_no }}" name="busNo" id="busNo" required>
      </div>
      <div class="mb-3">
        <label for="supervisorName" class="form-label">Supervisor Name *</label>
        <input type="text" class="form-control" value="{{ $businfo->supervisor_name }}" name="supervisorName" id="supervisorName" required>
      </div>
      <div class="mb-3">
        <label for="supervisorNumber" class="form-label">Supervisor Number *</label>
        <input type="number" class="form-control" value="{{ $businfo->supervisor_number }}" name="supervisorNumber" id="supervisorNumber" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection