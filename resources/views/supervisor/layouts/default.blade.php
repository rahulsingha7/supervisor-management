<!DOCTYPE html>
<html lang="en">
    <head>
        @include('supervisor.includes.head')
    </head>
    <body>
        <!-- Responsive navbar-->
       @include('supervisor.includes.nav')
        @yield('abcd')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('supervisor/js/scripts.js')}}"></script>
     
    </body>
</html>
