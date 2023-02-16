@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Post</h4>
            <form class="form-horizontal mt-3" method="POST" action="{{ route('blog_posts.update', $post->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter title" id="title" name="title" value="{{ $post->title }}"/>
                  @error('title')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="blog_category_id" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select class="form-select" id="blog_category_id" name="blog_category_id">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                      <option {{ $category->id == $post->blog_category_id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('blog_category_id')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" type="text" placeholder="Enter description" id="description" data-tinymce-inp="true" name="description">{{ $post->description }}</textarea>
                  @error('description')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input class="form-control preview-img-inp" type="file" placeholder="Upload blog image" id="image" name="image">
                  @error('image')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</p>
                  @enderror
                  <div class="preview-img-wrapper mt-3">
                    <img class="preview-img rounded avatar-xl" src="{{ $post->image ? asset($post->image) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" placeholder="Enter tags" id="tags" name="tags" value="{{ $post->tags }}" data-role="tagsinput"/>
                  @error('tags')
                    <p class="text-danger mt-1 mb-0">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info waves-effect waves-light" id="create_post_btn" name="create_post_btn">Update</button>
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