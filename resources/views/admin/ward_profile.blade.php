@extends('admin.app')

@section('content')
   <style>
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
		}
		.ward-details {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 50px;
		}
		.ward-details .ward-info {
			flex-basis: calc(50% - 20px);
			background-color: #f9f9f9;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			margin-bottom: 20px;
		}
		.ward-details .ward-info h2 {
			margin-top: 0;
		}
		.ward-details .ward-info p {
			margin-bottom: 0;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
		.booked-wards {
			margin-top: 50px;
		}
		.booked-wards h3 {
			margin-bottom: 20px;
		}
		.booked-wards table {
			margin-top: 20px;
		}
		.booked-wards .booked {
			background-color: #ffc107;
		}
		.booked-wards .available {
			background-color: #4caf50;
		}
    </style>
<div class="cover">
@include('sweetalert::alert')
<div class="search-container">
    <input type="text" id="phone-search" placeholder="Search for phone numbers...">
  </div>
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">
                    X
                </button>
                {{ session()->get('message') }}

            </div>
            @endif
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fa fa-plus" aria-hidden="true">
                    Register Patient
                </i>
              </button> --}}
            <h5 class="card-title mb-0">All Patient</h5>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Doctor</th>
                    <th>Ticket</th>
                    <th>Book Ward</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patient as $user)

                <tr>
                    <td>
                        <i class="fa fa-trophy"></i>
                        {{ $user->id }}
                    </td>
                    <td>{{ $user->patient_name }}</td>
                    <td>
                        </i><span class="badge bg-success">{{ $user->doctor_name }}</span>
                    </td>
                    <td>
                    </i><span class="badge bg-danger">#{{ $user->ticket_id }}</span>
                </td>
                    {{-- <select name="status" id="">
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                        <option value="platinumz">Platinumz</option>
                    </select> --}}

                      <td>

                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#sendWard_{{ $user->id }}">
                                                <i class="fa fa-address-book"></i>Book</a>
                                        </div>
                                        {{-- <div class="btn-group">
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addUser_{{ $user->id }}">
                                                <i class="fa fa-thermometer"></i>Treat</button>
                                        </div> --}}
                       </td>
                    </tr>
                     {{-- Approve loan issue --}}
                     <div class="modal right fade" id="sendWard_{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        {{-- modal for editing user details--}}
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Book Ward</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $user->id }}
                              </div>
                              <div class="modal-body" style="background: yellow;">
                                  <form action="{{ route('Booking_ward', $use->id) }}" method="post">
                                      @csrf
                                      <input type="hidden" name="ward_id" value="{{ $use->id }}">
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" value="{{ $user->patient_name }}" class="form-control" id="inputPassword" disabled>
                                        </div>
                                      </div>

                                      <div class="mb-3 row">
                                        <label for="Name" class="col-sm-2 col-form-label">Contact person</label>
                                        <div class="col-sm-10">
                                          <input type="number" name="next_of_kiln" class="form-control" id="next_of_kilne">
                                        </div>
                                      </div>

                                      {{-- <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Ticket Id</label>
                                        <div class="col-sm-10">
                                          <input type="text" value="{{ $user->ticket_id }}" class="form-control" id="inputPassword" disabled>
                                        </div> --}}
                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='{{  $user->id }}' class="btn btn-primary btn-block text-center">Send Lab</button>
                                          {{-- This is error nuber 1 --}}
                                            </div>
                                  </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Register Patients</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- <form action="{{ route('register_patients') }}" method="POST">
            @csrf
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Today</label>
              <div class="col-sm-10">
                <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Name" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" id="name">
              </div>
            </div>
            <div class="mb-3 row">
                <label for="Age" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                  <input type="number" name="age" class="form-control" id="age">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form> --}}
      </div>
    </div>
  </div>
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">

            <marquee class="card-title mb-0">The patient registered in our hospital</marquee>
        </div>


    </div>
</div>
</div>


<script>
    const searchInput = document.querySelector('#phone-search');
    const tableRows = document.querySelectorAll('#user-table tbody tr');

    searchInput.addEventListener('keyup', function(event) {
        const searchTerm = event.target.value.toLowerCase();

        tableRows.forEach(function(row) {
            const phoneCell = row.cells[3];
            const phone = phoneCell.textContent.toLowerCase();

            if (phone.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

</script>

{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!} --}}

@endsection
