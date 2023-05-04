

@extends('admin.app')

@section('content')
<style>
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #d92121;
    }

</style>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        {{-- <button class="btn btn-secondary">
            <i class="fa fa-plus">Add wards</i>
        </button> --}}

        <div class="card-header">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa fa-plus">Add ward</i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Wards</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background: rgb(220, 220, 191);">
          <form action="{{ route('ward_patients') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ward Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="image" id="inputPassword">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ward Name</label>
                <div class="col-sm-10">
                  <input type="text" name="ward_name" class="form-control" id="inputPassword">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Available beds</label>
                <div class="col-sm-10">
                  <input type="number" name="available_beds" class="form-control" id="inputPassword">
                </div>
              </div>
              {{-- <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Booked Beds</label>
                <div class="col-sm-10">
                  <input type="number" name="booked_beds" class="form-control" id="inputPassword">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Total beds</label>
                <div class="col-sm-10">
                  <input type="number" name="total_beds" class="form-control" id="inputPassword">
                </div>
              </div> --}}
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="id" value='' class="btn btn-primary">Save changes</button>
                {{-- {{  $wards->id }} --}}
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
          <h3 class="card-title">Ward Details</h3>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($wards as $ward)
              <div class="col-md-4 mb-3">
                <div class="card">
                  <img class="card-img-top" src="imagename/{{ $ward->image }}" style="height: 250px; width: 300px;" alt="{{ $ward->ward_name }}">
                  <div class="card-body">
                    <h3 class="card-title"> <b>{{ $ward->ward_name }}</b></h3>
                    <p class="card-text">
                      <strong>Available Beds:</strong> {{ $ward->available_beds }}<br>
                      <strong>Booked Beds:</strong> {{ $ward->booked_beds }}<br>
                      <strong>Total Beds:</strong> {{ $ward->total_beds }}
                    </p>
                    @if ($ward->available_beds >= 1)
                      <a href="{{ route('Patient_ward_profile', $ward->id) }}" class="btn btn-primary">Book Now</a>
                    @else
                      <button type="button" class="btn btn-danger">Not available</button>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
