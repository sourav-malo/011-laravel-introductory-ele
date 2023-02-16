@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Posts</h4>
              <table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->blogCategory->name }}</td>
                      <td>
                        <img width="60" src="{{ $post->image ? asset($post->image) : asset('uploads/no_image.jpg') }}" alt="" />
                      </td>
                      <td>{{ $post->tags }}</td>
                      <td class="d-flex">
                        <a href="{{ route('blog_posts.edit', $post->id) }}" class="btn btn-info me-2">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form class="post-delete-form" data-swal-delete-form="true" action="{{ route('blog_posts.destroy', $post->id) }}" enctype="multipart/form-data" method="post">
                          @csrf 
                          @method("DELETE")
                          <button class="btn btn-danger" data-swal-delete-btn="true">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div> <!-- end col -->
</div>

@endsection('admin')                        