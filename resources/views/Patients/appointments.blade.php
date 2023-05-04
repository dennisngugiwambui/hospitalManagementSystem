@extends('patients.app')

@section('content')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="active-member">
                                    <div class="btn btn-secondary">
                                        <i class="fa fa-plus">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#addingModal">
                                                Book Appointment
                                            </button>
                                        </i>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-xs mb-0">
                                            <thead>
                                                <tr style="background: crimson; color:black;">
                                                    <th>#</th>
                                                    <th>Doctor</th>
                                                    <th>Description</th>
                                                    <th>
                                                       <div class="badge badge-danger">
                                                        Action
                                                       </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><img src="{{ asset('./Admin-file/images/avatar/1.jpg') }}" class=" rounded-circle mr-3" alt="">1</td>
                                                    {{-- <td>{{ $contacts->id }}</td> --}}

                                                    <td>
                                                        {{-- <div>
                                                            <div class="progress" style="height: 6px">
                                                                <div class="progress-bar bg-success" style="width: 50%"></div>
                                                            </div>
                                                        </div> --}}
                                                        <div class="badge badge-danger">
                                                            Mr Denno
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div>
                                                            This is an example of the information
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                                                            <div class="btn btn-secondary"> <i class="fa fa-trash"> Update </i></div>
                                                        </button>
                                                    </td>

                                                </tr>
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                        <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Appointment</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure that you want to delete this appointment?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                 <!-- Modal -->
                 <div class="modal fade" id="addingModal" tabindex="-1" aria-labelledby="addingModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Appointment</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('appointment_add') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="name" class="form-control" id="inputName" required>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                          <input type="number" name="phone" class="form-control" id="inputPhone" required>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputDctor" class="col-sm-2 col-form-label">Doctor</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="doctor" id="floatingSelectDisabled" aria-label="Floating label " required>
                                                <option selected>--select--</option>
                                                <option value="1">Mr.Denno</option>
                                                <option value="2">Doctor Me</option>
                                                <option value="3">Musyoka</option>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="email" name="email" class="form-control" id="inputEmail" required>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Leave a message" name="message" id="floatingTextarea" required></textarea>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of the modal --}}
                <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-facebook">
                                    <span class="s-icon"><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-linkedin">
                                    <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-googleplus">
                                    <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-twitter">
                                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">89k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1">119k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


@endsection
