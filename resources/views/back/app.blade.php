<html>
    <head>
    </head>
    <body>
        @section('sidebar')
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!-- navigation start -->  
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Jashim Blog</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/admin">Home</a></li>
      <li class=""><a href="/aboutus_display">About</a></li>
      <li class=""><a href="/contact_display">Contact</a></li>

      <li class=""><a href="/comment_display">Comments</a></li>
      
      <li><a href="#">Logout</a></li>
    </ul>
  </div>
</nav>
<!-- navigation end -->
        @show

        <div class="container">
            @yield('content')
        </div>
@section('foot')        
        <footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Website Made By <a href="https://www.joshim.com" title="Visit joshim">Joshim </a></p>
</footer>

        @show

    </body>
</html>        