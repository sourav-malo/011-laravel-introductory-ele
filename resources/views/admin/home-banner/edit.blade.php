@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Home Banner</h4>
            <form class="form-horizontal mt-3" method="POST" action="{{ route('home-banner.edit') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="id" value="{{ $homeBannerDetails->id }}">
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter title" id="title" name="title" value="{{ $homeBannerDetails->title }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="short_text" class="col-sm-2 col-form-label">Short Text</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter short text" id="short_text" name="short_text" value="{{ $homeBannerDetails->short_text }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                <div class="col-sm-10">
                  <input class="form-control" type="url" placeholder="Enter video url" id="video_url" name="video_url" value="{{ $homeBannerDetails->video_url }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="banner_img" class="col-sm-2 col-form-label">Banner Image</label>
                <div class="col-sm-10">
                  <input class="form-control preview-img-inp" type="file" placeholder="Upload banner image" id="banner_img" name="banner_img">
                  <div class="banner-image-wrapper preview-img-wrapper mt-3">
                    <img class="banner-image preview-img rounded avatar-xl" src="{{ $homeBannerDetails['banner_img'] ? asset('uploads/banner-images/'. $homeBannerDetails['banner_img']) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="edit_home_banner_btn" name="edit_home_banner_btn">Edit Home Banner</button>
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