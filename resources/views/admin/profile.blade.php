@extends('admin.app')
@section('title', 'Profile')

@section('content')


{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

<style>
    /* General Styles */
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    .container {
    display: flex;
    flex-wrap: wrap;
    background: rosybrown;
    justify-content: space-between;
    align-items: flex-start;
    margin: 2rem;
    }

    /* Profile Section Styles */
    .profile {
    width: 100%;
    max-width: 500px;
    margin-bottom: 2rem;
    }

    .profile img {
    width: 50%;
    height: 50%;
    margin-bottom: 1rem;

    }

    .profile h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    }

    .profile h3 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    }

    .profile span {
    font-weight: normal;
    }

    .profile ul {
    list-style: none;
    margin-left: 1rem;
    }

    .profile ul li a {
    color: #333;
    text-decoration: none;
    margin-right: 1rem;
    }

    .profile ul li a:hover {
    text-decoration: underline;
    }

    /* Activity Section Styles */
    .activity {
    width: 100%;
    max-width: 500px;
    margin-bottom: 2rem;
    }

    .activity h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    }

    .activity h3 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    }

    .activity ul {
    list-style: none;
    margin-bottom: 2rem;
    }

    .activity ul li a {
    color: #333;
    text-decoration: none;
    }

    .activity ul li a:hover {
    text-decoration: underline;
    }

    /* Settings Section Styles */
    .settings {
    width: 100%;
    max-width: 500px;
    }

    .settings h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    }

    .settings h3 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    }

    .toggle {
    display: inline-block;
    position: relative;
    width: 40px;
    height: 24px;
    background-color: #ccc;
    border-radius: 12px;
    margin-bottom: 1rem;
    }

    .toggle input[type="checkbox"] {
    opacity: 0;
    width: 0;
    height: 0;
    }

    .toggle label {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 2px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #fff;
    transition: all 0.3s;
    }
    .toggle input[type="checkbox"]:checked + label {
    left: 18px;
    }

    @media only screen and (min-width: 768px) {
    .profile {
        width: 30%;
        margin-bottom: 0;
    }

    .activity {
        width: 65%;
        margin-bottom: 0;
    }

    .settings {
        width: 30%;
    }
    }

</style>

<div class="content-body">
    <link rel="stylesheet" type="text/css" href="style.css">
      <h1 class="bg bg-info"> <i class="fa fa-user"></i> User Dashboard</h1>
    <div class="container">
      <section class="profile">
        <h2>Profile Details</h2>
        <img src="{{ asset('Admin-file/images/profile-avatar.png') }}" alt="Profile Picture">
        <h3> <b class="badge badge-primary"> Name: </b> <span>{{ $user->name }}</span></h3>
        <h3> <b class="badge badge-primary">Email Address: </b> <span>{{ $user->email }}</span></h3>
        <h3> <b class="badge badge-primary">Google-Id: </b> <span>{{ $user->google_id }}</span></h3>
        <h3> <b class="badge badge-primary">Location: </b> <span>Kenya</span></h3>
        <h3> <b class="badge badge-primary">Phone Number: </b> <span>{{ $user->phone }}</span></h3>
        <h3>
            <button style="color:black;" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#editUser_{{ $users->id }}">
                 <i class="fa fa-user">
                    Edit Profile
                 </i>
            </button>
        </h3>
        <h3>
            <button class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#deleteAccount_{{ $destroy->id }}">
                Delete Account
            </button>
        </h3>
      </section>
       {{-- EDIT USER MODAL --}}
       <div class="modal right fade" id="editUser_{{ $users->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        {{-- modal for editing user details--}}
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{ $users->id }}
              </div>
              <div class="modal-body bg bg-success">
                  <form action="{{ route('users.update', $users->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                          <div class="form-group">
                              <label for="">Name</label>
                                  <input type="text" name="name" id="" value="{{ $users->name }}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                                  <input type="email" name="email" id="" value="{{ $users->email }}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Phone</label>
                                  <input type="number" name="phone" id="" value="{{ $users->phone }}" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Password</label>
                                  <input type="password" name="password" id="" value="{{ $users->password }}" class="form-control">
                          </div>
                          {{-- <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="1" @if ($users->usertype==1)
                                    selected

                                @endif>Admin</option>
                                <option value="2" @if ($users->usertype==0)
                                    selected

                                @endif>patient</option>
                            </select>
                        </div> --}}
                          <div class="modal-footer">
                              <button type="submit" name="id" value='{{  $users->id }}' class="btn btn-primary btn-block">Update User</button>
                          {{-- This is error nuber 1 --}}
                            </div>
                  </form>
              </div>
            </div>
        </div>
       </div>
        {{-- EDIT USER MODAL --}}
        <div class="modal right fade" id="deleteAccount_{{ $destroy->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            {{-- modal for editing user details--}}
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $destroy->id }}
                  </div>
                  <div class="modal-body bg bg-danger">
                      <form action="{{ route('destroy-user', $destroy->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label for="">WARNING 🤔😆</label>
                                <input type="text" name="name" id="" value="Are you sure that you want to destroy this user?" class="form-control" readonly>
                        </div>
                              <div class="form-group">
                                  <label for="">Name</label>
                                      <input type="text" name="name" id="" value="{{ $users->name }}" class="form-control" readonly>
                              </div>
                              <div class="form-group">
                                  <label for="">Email</label>
                                      <input type="email" name="email" id="" value="{{ $users->email }}" class="form-control" readonly>
                              </div>

                              <div class="modal-footer">
                                  <button type="submit" name="id" value='{{  $destroy->id }}' class="btn btn-primary btn-block">Deleted Account</button>
                              {{-- This is error nuber 1 --}}
                                </div>
                      </form>
                  </div>
                </div>
            </div>

    </div>
      <section class="activity">
        <h2>Activity</h2>
        <ul>
          <li><a href="#">Book Appointment</a></li>
          <li><a href="#">View Appointments</a></li>
          <li><a href="#">View Prescriptions</a></li>
          <li><a href="#">View Medical Records</a></li>
          <li><a href="#">Pay Bills</a></li>
        </ul>
        <h3><a href="#">View All Activity</a></h3>
      </section>
      {{-- <section class="settings">
        <h2>Settings</h2>
        <h3>Notifications</h3>
        <div class="toggle">
          <input type="checkbox" id="notifications">
          <label for="notifications"></label>
        </div>
        <h3>Privacy</h3>
        <div class="toggle">
          <input type="checkbox" id="privacy">
          <label for="privacy"></label>
        </div>
        <h3>Language</h3>
        <select>
          <option value="en">English</option>
          <option value="es">Español</option>
          <option value="fr">Français</option>
          <option value="de">Deutsch</option>
        </select>
      </section> --}}
    </div>
</div>

        <script>
            // Toggle email notifications
            const emailToggle = document.getElementById('email-notifications');
            emailToggle.addEventListener('change', () => {
                if (emailToggle.checked) {
                    console.log('Email notifications enabled');
                } else {
                    console.log('Email notifications disabled');
                }
            });

        </script>


@endsection
