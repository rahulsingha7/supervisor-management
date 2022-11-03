@extends('admin.layouts.default')
@section('abcd')

<div class="d-sm-flex align-items-center justify-content-betweenmt-5 mb-4">
    <h1 class="h3 mb-0 text-gray-800">Session List</h1>
</div>
<table class="table">
  <thead class="thead-light">
  <tr>
        <th>ID</th>
        <th>Session Name</th>
        <th>Action</th>
  </tr>
  </thead>
  <tbody>
      @if($sessionList)
            @foreach ($sessionList as $sl)
            <tr>
                <td>{{$sl->id}}</td>
                <td>{{$sl->session_name}}</td>
             <td>
                  <!-- Edit  -->
            <a href="{{ url('admin/edit-sessionName/'.$sl->id) }}" class="btn btn-info" data-toggle="modal" data-target="#myModal2{{$sl->id}}">Edit</a>
              <!-- The Modal -->
              <div class="modal" id="myModal2{{$sl->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Session Name</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                  <form method="post" action="{{url('admin/update-sessionName')}}">
                    {{csrf_field()}}
                    <div class="form-group mb-3">
                      <input
                        type="text"
                        class="form-control"
                        name="session_name"
                        id="session_name"
                        value="{{$sl->session_name}}"
                      />
                    </div>
                  </form>
                </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <a href="{{ url('admin/update-sessionName/'.$sl->id) }}" class="btn btn-info">Update</a>
                    </div>

                  </div>
                </div>
              </div>
          
             <!-- Delete -->
              <a href="{{ url('admin/delete-sessionName/'.$sl->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$sl->id}}">Delete</a>
              <!-- The Modal -->
              <div class="modal" id="myModal{{$sl->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Confirmation</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      Are you sure to delete <b>{{$sl->session_name}}</b>?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <a href="{{ url('admin/delete-sessionName/'.$sl->id) }}" class="btn btn-success">yes</a>
                    </div>

                  </div>
                </div>
              </div>
             </td>
            </td>
            </tr>
            @endforeach
        @endif
  </tbody>
</table>





@endsection