@extends('admin.app')

@section('content')

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
    <div class="card flex-fill w-100">
        <div class="card-header">

            <h5 class="card-title mb-0">My profile</h5>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->name }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->email }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->phone }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->status }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Mentor id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->referal_id }}" disabled>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label badge badge-info">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword" value="{{ auth()->user()->password }}" disabled>
            </div>
          </div>

    </div>
</div>

<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
  <div class="card flex-fill w-100">
      <div class="card-header">

          <h5 class="card-title mb-0">My referals</h5>
      </div>
      <table class="table table-success table-striped table-hover">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Level</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($referrals as $users)

              <tr>
                  <td>{{ $users->referring->id }}</td>
                  <td>{{ $users->referring->name }}</td>
                  <td>{{ $users->referring->email }}</td>
                  <td>{{ $users->referring->phone }}</td>
                  <td>
                      <span class="badge bg-success">{{ $users->referring->status }}</span>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
