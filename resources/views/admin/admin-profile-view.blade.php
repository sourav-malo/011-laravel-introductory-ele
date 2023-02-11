@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="text-center mt-4">
            <img class="card-img-top img-fluid rounded-circle avatar-xl" src="{{ $adminRow['profile_pic'] ? asset($adminRow['profile_pic']) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
          </div>
          <div class="card-body">
            <h4 class="card-title">Name: {{ $adminRow->name }}</h4>
            <hr>
            <h4 class="card-title">Email: {{ $adminRow->email }}</h4>
            <hr>
            <h4 class="card-title">Username: {{ $adminRow->username }}</h4>
            <hr>
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-info btn-rounded waves-effect waves-light" href="">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('admin')