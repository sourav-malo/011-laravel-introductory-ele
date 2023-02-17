@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Footer</h4>
            <form class="form-horizontal mt-3" method="POST" action="{{ route('footer.update') }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label for="phone_num" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input class="form-control" type="tel" placeholder="Enter phone number" id="phone_num" name="phone_num" value="{{ $footerDetails->phone_num }}">
                  @error('phone_num')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="contact_us_desc" class="col-sm-2 col-form-label">Contact Us Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" placeholder="Enter contact us description" id="contact_us_desc" name="contact_us_desc">{{ $footerDetails->contact_us_desc }}</textarea>
                  @error('contact_us_desc')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="country" class="col-sm-2 col-form-label">Country</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter country" id="country" name="country" value="{{ $footerDetails->country }}">
                  @error('country')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter address" id="address" name="address" value="{{ $footerDetails->address }}">
                  @error('address')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter email" id="email" name="email" value="{{ $footerDetails->email }}">
                  @error('email')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="socially_connect_desc" class="col-sm-2 col-form-label">Socially connect description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" placeholder="Enter socially connect description" id="socially_connect_desc" name="socially_connect_desc">{{ $footerDetails->socially_connect_desc }}</textarea>
                  @error('socially_connect_desc')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="facebook_url" class="col-sm-2 col-form-label">Facebook URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter facebook url" id="facebook_url" name="facebook_url" value="{{ $footerDetails->facebook_url }}">
                  @error('facebook_url')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="twitter_url" class="col-sm-2 col-form-label">Twitter URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter twitter url" id="twitter_url" name="twitter_url" value="{{ $footerDetails->twitter_url }}">
                  @error('twitter_url')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="behance_url" class="col-sm-2 col-form-label">Behance URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter behance url" id="behance_url" name="behance_url" value="{{ $footerDetails->behance_url }}">
                  @error('behance_url')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="linkedin_url" class="col-sm-2 col-form-label">Linkedin URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter linkedin url" id="linkedin_url" name="linkedin_url" value="{{ $footerDetails->linkedin_url }}">
                  @error('linkedin_url')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="instagram_url" class="col-sm-2 col-form-label">Instagram URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter instagram url" id="instagram_url" name="instagram_url" value="{{ $footerDetails->instagram_url }}">
                  @error('instagram_url')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="edit_footer_btn" name="edit_footer_btn">Edit Footer</button>
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