@extends('backend.layout.app')
@section('content')
  <!--start breadcrumb-->
  <h1 class="text-center">Create Bus Information</h1>
  <div style="width:500px; margin:0px auto;">
    <form action="{{ route('bus.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="busNo" class="form-label">Bus No. *</label>
        <input type="number" class="form-control" name="busNo" id="busNo" placeholder="bus no..." required>
      </div>
      <div class="mb-3">
        <label for="supervisorName" class="form-label">Supervisor Name *</label>
        <input type="supervisorName" class="form-control" name="supervisorName" id="supervisorName" placeholder="supervisor name..." required>
      </div>
      <div class="mb-3">
        <label for="supervisorNumber" class="form-label">Supervisor Number *</label>
        <input type="number" class="form-control" name="supervisorNumber" id="supervisorNumber" placeholder="stopage order..." required>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection