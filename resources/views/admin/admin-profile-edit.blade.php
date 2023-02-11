@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Profile</h4>
            <form class="form-horizontal mt-3" method="POST" action="{{ route('admin.profile.edit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter your name" id="name" name="name" value="{{ $adminRow->name }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input class="form-control" type="email" placeholder="Enter your email" id="email" name="email" value="{{ $adminRow->email }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter your username" id="username" name="username" value="{{ $adminRow->username }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="profile_pic" class="col-sm-2 col-form-label">Profile Picture</label>
                <div class="col-sm-10">
                  <input class="preview-img-inp form-control" type="file" placeholder="Upload your profile picture" id="profile_pic" name="profile_pic">
                  <div class="preview-img-wrapper profile-pic-wrapper mt-3">
                    <img class="preview-img profile-pic rounded avatar-xl" src="{{ $adminRow['profile_pic'] ? asset($adminRow['profile_pic']) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="edit_profile_btn" name="edit_profile_btn">Edit Profile</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- end col -->
    </div>
  </div>
</div>

@endsection('admin')