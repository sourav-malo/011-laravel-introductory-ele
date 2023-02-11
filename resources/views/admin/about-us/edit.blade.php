@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">About Us</h4>
            <form class="form-horizontal mt-3" method="POST" action="{{ route('about-us.edit') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="id" value="{{ $aboutUsDetails->id }}">
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter title" id="title" name="title" value="{{ $aboutUsDetails->title }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter short title" id="short_title" name="short_title" value="{{ $aboutUsDetails->short_title }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" type="text" placeholder="Enter short description" id="short_description" rows="5" name="short_description">{{ $aboutUsDetails->short_description }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" type="text" placeholder="Enter long description" id="long_description" data-tinymce-inp="true" name="long_description">{{ $aboutUsDetails->long_description }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="about_us_image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input class="form-control preview-img-inp" type="file" placeholder="Upload about us image" id="about_us_image" name="about_us_image">
                  <div class="about-us-image-wrapper preview-img-wrapper mt-3">
                    <img class="about-us-image preview-img rounded avatar-xl" src="{{ $aboutUsDetails['about_us_image'] ? asset($aboutUsDetails['about_us_image']) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="about_us_multi_images" class="col-sm-2 col-form-label">Multi Images</label>
                <div class="col-sm-10">
                  <input class="form-control mb-2" type="file" placeholder="Upload about us image" id="about_us_multi_images" name="about_us_multi_images[]" multiple>
                  <span class="text-muted">Note: you can upload multiple images at once replacing the previous ones or customize one by one.</span>
                  <ul class="about-us-multi-images-items list-unstyled d-flex flex-wrap">
                    @php $editIdx = $deleteIdx = 0; @endphp
                    @foreach(json_decode($aboutUsDetails->about_us_multi_images) as $multiImage)
                      <li class="about-us-multi-images-item p-3">
                        <img class="mb-2" src="{{ asset($multiImage) }}" alt="" width="120"> <br/>
                        <label for="about_us_edit_multi_image_{{ $editIdx }}" class="btn btn-info">Edit</label>
                        <input type="file" class="about_us_edit_multi_image d-none" id="about_us_edit_multi_image_{{ $editIdx }}" name="about_us_edit_multi_image_{{ $editIdx }}">
                        <button type="button" data-idx="{{ $deleteIdx++ }}" class="about-us-multi-images-delete-btn mb-2 btn btn-danger">Delete</button>
                      </li>
                      @php $editIdx++; $deleteIdx++; @endphp
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="edit_about_us_btn" name="edit_about_us_btn">Edit About Us</button>
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