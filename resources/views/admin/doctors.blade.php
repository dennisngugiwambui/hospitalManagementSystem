@extends('admin.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">

        <div>
            <!-- Button trigger modal -->
            <style>
                .btn-custom {
                    padding-top: 15px;
                    padding-bottom: 30px;
                    animation: pulse 1s infinite;
                    color: #fff;
                    font-size: 1.2rem;
                    margin-right: 5px;
                }

                @keyframes pulse {
                    0% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.1);
                    }
                    100% {
                        transform: scale(1);
                    }
                }
            </style>
<button type="button" class="btn btn-primary btn-custom text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-flower">
        Add Doctor
    </i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('adding_doctors') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <input class="form-control" name="image" type="file" id="formFile" required>
                          </div>

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="speciality" class="col-md-4 col-form-label text-md-end">{{ __('Doctor Speciality') }}</label>

                    <div class="col-md-6">
                            <select class="form-select" name="speciality" id="floatingSelect" aria-label="Floating label select example" required>
                              <option disabled selected>--choose doctor--</option>
                              <option value="Dentist">Dentist</option>
                              <option value="Cardilogist">Cardilogist</option>
                              <option value="ENT Specialist">ENT Specialist</option>
                              <option value="astrologist">astrologist</option>
                              <option value="neuroanatomist">neuroanatomist</option>
                              <option value="Lab">Lab</option>
                              <option value="Counselling">Counselling</option>
                              <option value="VCT">VCT</option>
                            </select>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
        </div>
        <form action="{{ route('search-users') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by phone number" name="search">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <div class="card-header">
            <h5 class="card-title mb-0">All Doctors</h5>
        </div>
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Doctor</th>
                    <th>Speciality</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)

                <tr>
                    <td>
                        <button type="button" class="btn btn-primary">
                            <span class="badge badge-light">
                                {{ $users->id }}
                            </span>
                        </button>
                    </td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->speciality }}</td>
                    <td><img src="imagename/{{$users->image}}" class="img-fluid" style="height: 50px; width: 50px;"></td>
                      <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editUser_{{ $users->id }}">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser_{{ $users->id }}"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                       </td>
                    </tr>
                     {{-- EDIT USER MODAL --}}
                     <div class="modal right fade" id="deleteUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        {{-- modal for editing user details--}}
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $users->id }}
                              </div>
                              <div class="modal-body">
                                {{-- {{ route('delete_users', $users->id) }} --}}
                                  <form action="{{ route('destroy-user', $users->id) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <p>Do you want to permanently delete <i class="fa fa-user"></i> {{ $users->name }} from the database?</p>


                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary btn-block">Delete User</button>
                                          {{-- This is error nuber 1 --}}
                                            </div>
                                  </form>
                              </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
          </table>
    </div>
</div>

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">
        <div class="card-header">
          <div class="mb-3 row">
            {{-- <label for="disabledTextInput" class="form-label">Refer new</label>
            @forelse(auth()->user()->getReferrals() as $referral)
            <center>
                <input type="text" value="{{ $referral->link }}" id="disabledTextInput" class="form-control" disabled>
                {{-- <a href="{{ $referral->link }}" target="blank">{{ $referral->link }}</a> --}}
            {{-- Total Referred Users:
                <p class="">  {{ $referral->relationships()->count() }}</p>

        @empty
            No referrals
        </center> --}}
        {{-- @endforelse --}}
          </div>

    </div>

</div>
{!! Toastr::message() !!}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

@endsection
