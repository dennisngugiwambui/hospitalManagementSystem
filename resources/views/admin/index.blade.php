@extends('admin.app')
@section('content')

<style>
  /* Dashboard styles */
  .dashboard {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  /* Card styles */
  .card {
    width: 30%;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px #ddd;
    background-color: #8bef93;
    border-radius: 5px;
  }

  .card-header {
    padding: 10px;
    background-color: #f0f0f0;
    font-weight: bold;
    font-size: 1.2rem;
  }

  .card-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
  }

  .card-body .count {
    font-size: 3rem;
    font-weight: bold;
  }

  .card-body .label {
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
    color: #999;
  }
  /* Style for mobile devices */
@media only screen and (max-width: 600px) {
  .dashboard {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .card {
    width: 80%;
    background-color: #8bef93;
    margin-bottom: 20px;
  }
  .card:hover {
  transform: scale(1.05);
}


  .card-header {
    font-size: 18px;
  }

  .card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .count {
    font-size: 30px;
  }

  .label {
    font-size: 14px;
    margin-top: 10px;
  }
}
.total-amount {
  background-color: #d6ae8c;
  color: #fff;
  display: inline-block;
  font-size: 1.2rem;
  font-weight: bold;
  padding: 5px 10px;
  border-radius: 10px;
}

#total-amount {
  margin-left: 5px;
}


#total-amount:before {
  content: "Ksh ";
}


</style>
<div class="total-amount">
    Earnings: <span id="total-amount">$10000</span>
  </div>
<div class="dashboard">
    <div class="card">
      <div class="card-header">Total Users</div>
      <div class="card-body">
        <span class="count">
            {{-- <a href="{{ route('allusers', Auth::user()->id) }}"> --}}
               {{ $user }}
           {{-- </a> --}}
        </span>
        <a href="{{ route('allusers', Auth::user()->id) }}">
        <span class="label">Users</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Wards</div>
      <div class="card-body">
        <span class="count">{{ $wards }}</span>
        <a href="/wards">
            <span class="label">Total Wards</span>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Total Medicine</div>
      <div class="card-body">
        <span class="count">{{ $pharmacy }}</span>
        <a href="/pharmacy">
        <span class="label">Medicines</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Total Patients</div>
      <div class="card-body">
        <span class="count">{{ $patients }}</span>
        <a href="/receptionist">
        <span class="label">patients</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Total Treatment</div>
      <div class="card-body">
        <span class="count">{{ $treatment }}</span>
        <a href="/treatment">
        <span class="label">treatment</span>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Total Lab Tests</div>
      <div class="card-body">
        <span class="count">{{ $lab_test }}</span>
        <a href="/laboratory">
        <span class="label">tests</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Doctors</div>
      <div class="card-body">
        <span class="count">{{ $doctors }}</span>
        <a href="{{ route('doctors', Auth::user()->id) }}">
        <span class="label">doctors</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Contacts</div>
      <div class="card-body">
        <span class="count">{{ $contact }}</span>
        <a href="/contacted">
        <span class="label">Contacts</span>
    </a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">Total Booking</div>
      <div class="card-body">
        <span class="count">{{ $booked }}</span>
        <span class="label">bookings made</span>
      </div>
    </div>

  </div>

  <script>
    // Add event listener to the total amount paid badge
    const amountBadge = document.querySelector('.total-amount .amount');
    amountBadge.addEventListener('click', function() {
      alert('Total amount paid: $5000');
    });
  </script>
@endsection
