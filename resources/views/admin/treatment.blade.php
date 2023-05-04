@extends('admin.app')

@section('content')


{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}

<style>
    .cover {
        /* background: url(http://blog.fancyyarnbazar.com/wp-content/uploads/2018/04/architecture-2562705_1920-1024x576.jpg) no-repeat center fixed; */
        z-index: 0;
        border-bottom: 1px solid #ccc;
        /* color:#1c0404; */
}
.search-container {
  margin-bottom: 20px;
}

#phone-search {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

.button-container {
  position: relative;
  display: inline-block;
}

.main-button {
  background-color: blue;
  color: white;
  padding: 5px 10px;
  border-radius: 3px;
  border: none;
  cursor: pointer;
  font-size: 12px;
}

.sub-buttons {
  position: absolute;
  top: 100%;
  left: 0;
  background-color: white;
  border-radius: 3px;
  border: 1px solid blue;
  display: none;
  z-index: 1;
}

td {
  position: relative;
}

.main-button:hover + .sub-buttons, .sub-buttons:hover {
  display: block;
}

.view-button, .setting-button, .edit-button {
  display: block;
  padding: 5px 10px;
  border: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  font-size: 12px;
}

.view-button:hover, .setting-button:hover, .edit-button:hover {
  background-color: blue;
  color: white;
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
            <h5 class="card-title mb-0">All users</h5>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Doctor</th>
                    <th>Ticket</th>
                    <th>Send Lab</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)

                <tr>
                    <td>
                        <i class="fa fa-trophy"></i>
                        {{ $user->id }}
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>
                        </i><span class="badge bg-success">{{ $user->doctor }}</span>
                    </td>
                    <td>
                    </i><span class="badge bg-danger">{{ $user->ticket_id }}</span>
                </td>
                    {{-- <select name="status" id="">
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                        <option value="platinumz">Platinumz</option>
                    </select> --}}

                      <td>

                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-success" href="{{ route('user_details', $user->id) }}">
                                                <i class="fa fa-eye-slash"></i>view</a>
                                        </div>
                                        {{-- <div class="btn-group">
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addUser_{{ $user->id }}">
                                                <i class="fa fa-thermometer"></i>Treat</button>
                                        </div> --}}
                       </td>
                    </tr>
                     {{-- Approve loan issue --}}
                     <div class="modal right fade" id="addUser_{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        {{-- modal for editing user details--}}
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Lab Comments</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $user->id }}
                              </div>
                              <div class="modal-body" style="background: yellow;">
                                  <form action="{{ route('Doctor_booking', $user->id) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" value="{{ $user->name }}" class="form-control" id="inputPassword" disabled>
                                        </div>
                                      </div>

                                      <div class="mb-3 row">
                                        <label for="Name" class="col-sm-2 col-form-label">Today</label>
                                        <div class="col-sm-10">
                                          <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
                                        </div>
                                      </div>
                                      <!-- Textarea 8 rows height -->
                                      <div class="form-outline">
                                        <textarea class="form-control" id="textAreaExample2" rows="8"></textarea>
                                        <label class="form-label" for="textAreaExample2">Message</label>
                                    </div>
                                      </div>

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
          <form action="{{ route('register_patients') }}" method="POST">
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
    </form>
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
