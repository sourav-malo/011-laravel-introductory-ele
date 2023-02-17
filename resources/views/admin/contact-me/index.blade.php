@extends('admin.admin-master')
@section('admin')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Messages</h4>
              <table class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Budget</th>
                    <th>Message</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                    <tr>
                      <td>{{ $message->id }}</td>
                      <td>{{ $message->name }}</td>
                      <td>{{ $message->email }}</td>
                      <td>{{ $message->subject }}</td>
                      <td>{{ $message->budget }}</td>
                      <td>{{ $message->message }}</td>
                      <td class="d-flex">
                        <form class="message-delete-form" data-swal-delete-form="true" action="{{ route('contact_me.destroy', $message->id) }}" enctype="multipart/form-data" method="post">
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