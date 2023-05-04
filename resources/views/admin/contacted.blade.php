@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Contact Form Entries</h3>
    </div>
    <div class="card-body">
      <table id="contact-form-entries" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($contact as $contact)
          <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ $contact->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
