@extends('admin.app')


@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@include('sweetalert::alert')

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
        <div class="card-header">

            <h5 class="card-title mb-0">All users</h5>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Tciket id</th>
                    <th>Doctor Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->patient_name }}</td>
                    <td>{{ $user->patient_phone }}</td>
                    <td>
                        <i class="fa fa-trophy"></i><span class="badge bg-success">{{ $user->ticket_id }}</span>
                    </td>
                    {{-- <select name="status" id="">
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                        <option value="platinumz">Platinumz</option>
                    </select> --}}
                    <td>{{ $user->doctor_name }}</td>
                      <td>
                                        <div class="btn-group">
                                            <a href="{{ route('lab_testing', $user->id) }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-edit"></i>View</a>
                                        </div>
                       </td>
                    </tr>
                     {{-- Hospital issues --}}
                     <div class="modal right fade" id="editUser_{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        {{-- modal for editing user details--}}
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Upgrade User</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $user->id }}
                              </div>
                              <div class="modal-body" style="background: yellow;">
                                  <form action="" method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option disabled selected>Open this select menu</option>
                                                <option value="Platinum">Platinum(Level3)</option>
                                                <option value="Silver">Silver(level2)</option>
                                                <option value="Gold">Gold(level1)</option>
                                              </select>
                                        </div>
                                      </div>

                                          <div class="modal-footer">
                                              <button type="submit" name="id" value='{{  $user->id }}' class="btn btn-primary btn-block text-center">Upgrade User</button>
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
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <!-- Button trigger modal -->
    <div class="card flex-fill w-100">
    </div>
</div>


<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@endsection
