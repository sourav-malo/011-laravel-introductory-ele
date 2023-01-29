@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Change Password</h4>

            @if(count($errors)) 
              <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                {{ $errors->all()[0] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form class="form-horizontal mt-3" method="POST" action="{{ route('admin.change-password') }}" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                  <input class="form-control" type="password" placeholder="Enter your current password" id="cur_password" name="cur_password" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input class="form-control" type="password" placeholder="Enter your new password" id="new_password" name="new_password" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input class="form-control" type="password" placeholder="Confirm your password" id="confirm_password" name="confirm_password" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="change_password_btn" name="change_password_btn">Change Password</button>
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