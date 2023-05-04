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
{{-- <button type="button" class="btn btn-primary btn-custom text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-flower">
        Add users
    </i>
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
            <h5 class="card-title mb-0">All users</h5>
        </div>
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)

                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->phone }}</td>
                    <td>
                        <span class="badge bg-success">{{ $users->usertype }}</span>
                    </td>
                      <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editUser_{{ $users->id }}">
                                                <i class="fa fa-edit"></i>Edit</button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser_{{ $users->id }}"> <i class="fa fa-trash"></i> Del</button>

                                        </div>
                       </td>
                    </tr>
                     {{-- Delete USER MODAL --}}
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

                    {{-- Delete USER MODAL --}}
                    <div class="modal right fade" id="editUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        {{-- modal for editing user details--}}
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Change User Role</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $users->id }}
                              </div>
                              <div class="modal-body">
                                {{-- {{ route('delete_users', $users->id) }} --}}
                                  <form action="{{ route('making_admin', $users->id) }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Change Role</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="usertype" id="floatingSelect" aria-label="Floating label select example">
                                                  <option disabled selected>--change role--</option>
                                                  <option value="patient">patient</option>
                                                  <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                      </div>

                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary btn-block">Change Role</button>
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

            <h5 class="card-title mb-0">My Details</h5>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->name }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10 badge badge-danger">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->usertype }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Location</label>
            <div class="col-sm-10 badge badge-danger">
                <input type="text" class="form-control" id="inputPassword" value="Kenya" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10 badge badge-danger">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->email }}" disabled>
            </div>
          </div>
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
