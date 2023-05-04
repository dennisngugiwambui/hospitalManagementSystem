@extends('admin.app')

@section('content')
<style>
    * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

.container {
	max-width: 1200px;
	margin: 0 auto;
	padding: 20px;
}

.cover-photo {
	height: 250px;
	overflow: hidden;
}

.cover-photo img {
	width: 100%;
	height: auto;
	object-fit: cover;
}

.profile-picture {
	width: 150px;
	height: 150px;
	border-radius: 50%;
	border: 5px solid #fff;
	margin-top: -75px;
	margin-left: 20px;
	overflow: hidden;
	position: relative;
	z-index: 1;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.profile-picture img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.user-info {
	margin-top: 40px;
	padding: 20px;
	background-color: #fff;
	box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.user-name {
	font-size: 30px;
	margin-bottom: 10px;
}

.user-bio {
	font-size: 16px;
	margin-bottom: 20px;
	line-height: 1.5;
}

.user-stats {
	list-style: none;
	margin-bottom: 20px;
}

.user-stats li {
	display: inline-block;
	margin-right: 20px;
	font-size: 16px;
}

.edit-profile {
	padding: 10px 20px;
	background-color: #007bff;
	color: #fff;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	transition: background-color 0.3s ease;
}

.edit-profile:hover {
	background-color: #0069d9;
}
/* media queries for mobile view */
@media (max-width: 767px) {
  body {
    font-size: 14px;
  }

  .container {
    padding: 10px;
  }

  .header {
    padding: 5px;
  }

  h1 {
    font-size: 1.5em;
  }
}


<style>
    .user-stats {
        list-style-type: none;
        margin-top: 20px;
        padding-left: 0;
        display: flex;
        justify-content: space-between;
    }

    .user-stats li {
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .user-stats .date {
        background-color: #FFA500;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .user-stats .ticket-id {
        background-color: #6495ED;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .lab-comment {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: 10px;
  margin-top: 20px;
}

.lab-comment h1 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.lab-comment .user-bio {
  font-size: 16px;
  margin-bottom: 5px;
}

.lab-comment .user-stats {
  list-style: none;
  margin: 0;
  padding: 0;
}

.lab-comment .user-stats li {
  display: inline-block;
  margin-right: 10px;
  font-size: 14px;
  color: #999;
}

.lab-comment .user-stats li span {
  font-weight: bold;
  color: #333;
}

</style>

<div class="container">
    <div class="cover-photo">
        <img src="{{ asset('Admin/img/avatars/profile-1.jpg') }}" alt="Cover Photo">
    </div>
    <div class="profile-picture">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture">
    </div>
    <div class="user-info">
        @foreach ($data as $key => $value)
            @if ($key == 0)
                <h1 class="user-name">{{ $value->patient_name }}</h1>
            @endif
            <p class="user-bio">{{ $value->comment }}</p>
            <ul class="user-stats">
                <li class="date"><span>Date:</span> {{ $value->date }}</li>
                <li class="ticket-id"><span>Ticket:</span> {{ $value->ticket_id }}</li>
            </ul>
        @endforeach
        <div class="lab-comment">
            <h1 class="user-name">Lab Comment</h1>
            @foreach ($comment as $item)
            <p class="user-bio">{{ $item->comment }}</p>
            <ul class="user-stats">
                <li class=""><span>Date:</span> {{ $item->date }}</li>
                <li class="date"><span>Ticket:</span> {{ $item->ticket_id }}</li>
            </ul>
            @endforeach
        </div>
        <button class="edit-profile"  data-bs-toggle="modal" data-bs-target="#editUser_{{ $value->id }}">Lab Comment</button>
    </div>



	{{-- <div class="container">
		<div class="cover-photo">
			<img src="{{ asset('Admin/img/avatars/profile-1.jpg') }}" alt="Cover Photo">
		</div>
		<div class="profile-picture">
			<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture">
		</div>
		<div class="user-info">
            @foreach ($data as $key => $value)
        @if ($key == 0)
            <h1 class="user-name">{{ $value->patient_name }}</h1>
        @endif
        <p class="user-bio">{{ $value->comment }}</p>
        <ul class="user-stats">
            <li><strong>Date</strong> {{ $value->date }}</li>

            <li><strong>Ticket</strong> {{ $value->ticket_id }}</li>
        </ul>
    @endforeach
			<button class="edit-profile">Edit Profile</button>
		</div>
	</div> --}}
    {{-- Hospital issues --}}
    <div class="modal right fade" id="editUser_{{ $value->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        {{-- modal for editing user details--}}
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Lab Results</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{ $value->id }}
              </div>
              <div class="modal-body" style="background: yellow;">
                  <form action="{{ route('Lab_Data', $value->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Lab Comment</label>
                        <div class="col-sm-10">
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="Name" class="col-sm-2 col-form-label">Today</label>
                        <div class="col-sm-10">
                          <input type="date" name="last_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" disabled>
                        </div>
                      </div>

                      <div class="col-sm-10">
                        <select class="form-select" name="lab_tech" aria-label="Default select example" required>
                            <option disabled selected>--select--</option>
                            @foreach ($use as $item)
                             @if ($item->speciality == 'Lab')
                               <option value="{{ $item->name }}">{{ $item->name }}</option>
                             @endif
                            @endforeach
                          </select>
                    </div>
                      <!-- Textarea 8 rows height -->
                      <div class="form-outline">
                        <label class="form-label" for="textAreaExample2">Message</label>
                        <textarea class="form-control" name="comment" id="textAreaExample2" rows="8"></textarea>
                    </div>
                      </div>

                          <div class="modal-footer">
                              <button type="submit" name="id" value='{{  $value->id }}' class="btn btn-primary btn-block text-center">Submit Report</button>
                          {{-- This is error nuber 1 --}}
                            </div>
                  </form>
              </div>
            </div>
        </div>
    </div>




@endsection
