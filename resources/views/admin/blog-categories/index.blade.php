@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">All Categories</h4>
              <table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td class="d-flex">
                        <a href="{{ route('blog_categories.edit', $category->id) }}" class="btn btn-info me-2">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form class="category-delete-form" data-swal-delete-form="true" action="{{ route('blog_categories.destroy', $category->id) }}" enctype="multipart/form-data" method="post">
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