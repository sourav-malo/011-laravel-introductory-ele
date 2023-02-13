@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">All Portfolios</h4>
              <table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($portfolios as $portfolio)
                    <tr>
                      <td>{{ $portfolio->id }}</td>
                      <td>{{ $portfolio->title }}</td>
                      <td>{{ $portfolio->sub_title }}</td>
                      <td>
                        <img width="60" src="{{ $portfolio->image ? asset($portfolio->image) : asset('uploads/no_image.jpg') }}" alt="" />
                      </td>
                      <td class="d-flex">
                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-info me-2">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form class="portfolio-delete-form" action="{{ route('portfolios.destroy', $portfolio->id) }}" enctype="multipart/form-data" method="post">
                          @csrf 
                          @method("DELETE")
                          <button class="btn btn-danger">
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