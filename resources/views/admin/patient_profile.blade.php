@extends('admin.app')

@section('content')
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">
        <div class="card-header">

            <h5 class="card-title mb-0">My profile</h5>
        </div>
        <style>
            .account-settings .user-profile {
                margin: 0 0 1rem 0;
                padding-bottom: 1rem;
                text-align: center;
            }
            .account-settings .user-profile .user-avatar {
                margin: 0 0 1rem 0;
            }
            .account-settings .user-profile .user-avatar img {
                width: 90px;
                height: 90px;
                -webkit-border-radius: 100px;
                -moz-border-radius: 100px;
                border-radius: 100px;
            }
            .account-settings .user-profile h5.user-name {
                margin: 0 0 0.5rem 0;
            }
            .account-settings .user-profile h6.user-email {
                margin: 0;
                font-size: 0.8rem;
                font-weight: 400;
                color: #9fa8b9;
            }
            .account-settings .about {
                margin: 2rem 0 0 0;
                text-align: center;
            }
            .account-settings .about h5 {
                margin: 0 0 15px 0;
                color: #007ae1;
            }
            .account-settings .about p {
                font-size: 0.825rem;
            }
            .form-control {
                border: 1px solid #cfd1d8;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                font-size: .825rem;
                background: #ffffff;
                color: #2e323c;
            }

            .card {
                background: #ffffff;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                border: 0;
                margin-bottom: 1rem;
            }
            </style>
            <div class="container">
                <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name">{{ $users->name }}</h5>
                                <h6 class="user-email">{{ $users->phone }}</h6>
                            </div>
                            <div class="about">
                                <h5>Ticket</h5>
                                <p>
                                    <span class="bg bg-danger">
                                        <i class="fa fa-ticket"></i>
                                        {{ $users->ticket_id }}
                                    </span>
                                </p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser_{{ $users->id }}">
                                    Send to Ward
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editUser_{{ $users->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Send to Ward</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="background: rgb(128, 207, 124);">
                                        <form action="{{ route('adding_ward_patient', $users->id) }}" method="POST">
                                            @csrf
                                            <div>
                                                <p>Proceed by booking the ward for the patient. Quick recovery for the patient.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary">Booking</button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" disabled value="{{ $users->name }}" class="form-control" id="fullName" placeholder="Enter full name" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Ticket</label>
                                        <input type="email" value="#{{ $users->ticket_id }}" disabled class="form-control" id="eMail" placeholder="Enter email ID" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" value="{{ $users->phone }}" class="form-control" id="phone" placeholder="Enter phone number" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Address</label>
                                        <input type="text" class="form-control" id="website" placeholder="home area">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <marquee class="mt-3 mb-2 text-primary">We are glad to be serving these patient</marquee>
                                </div>
                            <div class="row gutters">
                                <div class=" col-12">
                                    <div class="text-right">
                                        <div class="btn-group">
                                        </div>
                                        <button id="submit" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#addUser_{{ $users->id }}">
                                            <i class="fa fa-registered"></i> Register
                                        </button>
                                        <button id="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#labUser_{{ $users->id }}">
                                            <i class="fa fa-ambulance"></i> Send Lab
                                        </button>
                                        <button id="submit" class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#clinicUser_{{ $users->id }}">
                                            <i class="fa fa-hospital-o"></i> Book Clinic
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <div class="modal right fade" id="addUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                {{-- modal for editing user details--}}
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Lab Comments</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $users->id }}
                                      </div>
                                      <div class="modal-body" style="background: yellow;">
                                          <form action="{{ route('patient_treatment', $users->id) }}" method="post" enctype="multipart/form-data">
                                              @csrf
                                              <div class="mb-3 row">
                                                <label for="Name" class="col-sm-2 col-form-label">Today</label>
                                                <div class="col-sm-10">
                                                  <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
                                                </div>
                                                {{-- <div class="form-floating">
                                                    <select class="form-select" name="doctor_name" id="floatingSelect" aria-label="Floating label select example" required>
                                                      <option disabled selected>---select---</option>
                                                      @foreach ($doctor as $doctor)
                                                      <option value="{{ $doctor->name }}-{{ $doctor->speciality }}">{{ $doctor->name }}-{{ $doctor->speciality }}</option>
                                                      @endforeach
                                                    </select>
                                                    <label for="floatingSelect">Works with selects</label>
                                                  </div> --}}

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="Street">Doctor's Comment</label>
                                                    {{-- <input type="name" class="form-control" id="Street" placeholder="Enter Street"> --}}
                                                </div>
                                            </div>

                                                <div class="form-floating col-12">
                                                    <textarea class="form-control" name="doctor_comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
                                                    <label for="floatingTextarea2">Comments</label>
                                                  </div>

                                                  <div class="modal-footer">
                                                      <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary btn-block text-center">Add Record</button>
                                                  {{-- This is error nuber 1 --}}
                                                    </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Modal -->
                        <div class="modal fade" id="labUser_{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Sending Patients to Lab</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('getting_lab', $users->id) }}" method="post">
                                        @csrf
                                        Are you sure you want to send this patient to Laboratory
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary">👍Agree</button>
                                        </div>
                                    </form>
                            </div>
                            </div>
                             <!-- Modal -->
                        <div class="modal fade" id="editUser_{{ $users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Sending Patients to ward</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('getting_lab', $users->id) }}">
                                        Are you sure you want to send this patient to Laboratory
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Agree</button>
                                        </div>
                                    </form>
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
</div>
</div>

    </div>
    <style>
        .card {
      margin: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
      padding: 10px 15px;
      border-radius: 10px 10px 0 0;
    }

    .card-title {
      margin: 0;
      font-weight: bold;
      font-size: 20px;
    }

    .card-subtitle {
      margin: 5px 0 0 0;
      font-size: 14px;
    }

    .card-body {
      padding: 15px;
    }

    .card-text {
      margin: 0;
      font-size: 16px;
    }

    </style>
      <div class="card" style="background: rgb(214, 214, 37);">
       @foreach ($data as $data)
       <div class="card-header">
        <h4 class="card-title" id="doctor-name">{{ $data->doctor_name }}</h4>
        <h6 class="card-subtitle mb-2 text-muted badge badge-danger" id="datetime">{{ $data->date }}</h6>
      </div>
      <div class="card-body">
        <p class="card-text" id="comment">{{ $data->comment }}</p>
      </div>

       @endforeach
    </div>
    <div class="card" style="background: rgb(222, 222, 219);">
        @foreach ($lab as $lab)
        <div class="card-header" style="background:#6cae8f;">
         <h4 class="card-title" id="doctor-name">{{ $lab->lab_tech }}-Lab</h4>
         <h6 class="card-subtitle mb-2 text-muted badge badge-danger" id="datetime">{{ $lab->date }}</h6>
       </div>
       <div class="card-body">
         <p class="card-text" id="comment">{{ $lab->comment }}</p>
       </div>
       @endforeach
      </div>
    </div>

</div>



{{--
<style>

    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .profile-header {
        position: relative;
        margin-bottom: 20px;
    }

    .background-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .user-image {
        position: absolute;
        top: 150px;
        left: 50px;
        border: 5px solid #fff;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .user-image img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
    }

    .user-name {
        margin-top: 20px;
        float: right; /* added this line to float the user-name container to the right */
    }

    .user-name h1 {
        font-size: 36px;
        color: #333;
    }

    .user-bio {
        margin-top: 10px;
        margin-left: 210px; /* added this line to add margin on the left side to avoid overlap */
        clear: both; /* added this line to clear the float */
    }

    .user-bio p {
        font-size: 18px;
        color: #666;
        line-height: 1.5;
    }

    .profile-details {
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .user-details {
        margin-top: 20px;
    }

    .user-details ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .user-details li {
        display: inline-block;
        margin-right: 30px;
        font-size: 18px;
        color: #666;
    }

    .user-details li:last-child {
        margin-right: 0;
    }

    .comment {
        background-color: #f8f8f8;
        padding: 10px;
        margin-top: 20px;
        border-radius: 10px;
    }

    .comment-1 {
        color: #00bcd4;
    }

    .comment-2 {
        color: #8bc34a;
    }

    .comment-3 {
        color: #ff5722;
    }

    </style>
	<div class="profile-container">
		<div class="profile-header">
			<div class="background-image">
				<img src="https://www.w3schools.com/howto/img_mountains.jpg">
			</div>
			<div class="user-image">
				<img src="https://www.w3schools.com/howto/img_avatar.png">
			</div>
			<div class="user-name">
				<h1>John Doe</h1>
			</div>
			<div class="user-bio">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit, nisl vitae rutrum finibus, elit risus dictum purus, vel sollicitudin leo velit vel lacus.</p>
			</div>
		</div>
		<div class="profile-details">
			<div class="user-details">
				<ul>
					<li><strong>Date of Birth:</strong> January 1, 1990</li>
					<li><strong>Likes:</strong> 500</li>
					<li><strong>Followers:</strong> 1000</li>
					<li><strong>Comments:</strong> 200</li>
				</ul>
			</div>
		</div>
	</div> --}}





@endsection
