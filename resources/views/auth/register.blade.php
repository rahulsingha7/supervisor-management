
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style type="text/css">
  
body{
  background-image: url(http://www.joburgchiropractor.co.za/images/background.jpg);
  background-repeat: no-repeat;
  background-size: cover;
}

</style>

</head>
<body>


<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">
  
<h1 class="text-center text-success"> Registration page</h1>
<br/>

<div class="col-sm-12">

  <ul class="nav nav-pills" >

  @if(Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>                      
  @endif
    <li style="width:50%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#home">Teacher</a></li>
    <li style="width:48%"><a class=" btn btn-lg btn-default" data-toggle="tab" href="#menu1">Student</a></li>
  </ul>
<br/>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">    
<form method="post" action="{{url('register-store-teacher')}}">
  @csrf
  <div class="form-group">
    <label for="">Name:</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
  </div>

  <div class="form-group">
    <label for="">Email address:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
  </div>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
    @if(Session::has('err'))
       <div class="alert alert-danger">
        {{ Session::get('err') }}
       </div>
     @endif
  </div>

  <div class="form-group">
    <label for="confirm">Confirm Password:</label>
    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your password">
  </div>

  <button type="submit" class="btn btn-default btn-lg">Register</button>

</form>
<br/>
<a href="{{url('login')}}" class="pull-right btn btn-block btn-success" > Already Registered ?   </a>

    </div>
    <div id="menu1" class="tab-pane fade">

<form method="post" action="{{url('register-store')}}">
   @csrf
  <div class="form-group">
    <label for="Name">Name:</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="Name">Student ID:</label>
    <input type="number" class="form-control" name="sid" id="sid" placeholder="Enter Student ID">
  </div>
  
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
  </div>

  <div class="form-group">
    <label for="">Password:</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
    @if(Session::has('err'))
       <div class="alert alert-danger">
        {{ Session::get('err') }}
       </div>
     @endif
  </div>

  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your password">
  </div>

  <button type="submit" class="btn btn-default">Register</button>

</form>
<br/>
<a href="{{url('login')}}" class="pull-right btn btn-block btn-success" > Already Registered ?   </a>

    </div>
   </div>
  </div>
</div>
</div>
</body>
</html>
