@extends('admin.layouts.default')
@section('abcd')


<div class="container">
<div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="{{url('admin/store-session')}}">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label">Session Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="session_name" id="session_name" placeholder="Enter Session Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-dark btn-lg login-button">Create Session</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>


@endsection