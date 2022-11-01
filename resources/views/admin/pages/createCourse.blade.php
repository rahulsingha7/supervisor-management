@extends('admin.layouts.default')
@section('abcd')


<div class="container">
<div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="courseCode" id="courseCode" placeholder="Course Code" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="courseTitle" id="courseTitle" placeholder="Course Title" />
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="courseCredit" id="courseCredit" placeholder="Course Credit" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="semester" id="semester" placeholder="Select Semester" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="session" id="session" placeholder="Select Session" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-dark btn-lg login-button">Register</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>


@endsection