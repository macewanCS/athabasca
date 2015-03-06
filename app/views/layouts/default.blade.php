<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>EPL</title>
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css')}}
    {{ HTML::script('js/bootstrap.min.js') }}
  </head>
 
  <body>
	 <nav class="navbar navbar-default">
	<div class="container">
		<a href="{{URL::to('/')}}"><img src={{asset('/images/EPL_logo2.png')}}  alt="EPL" style="width:410px;height:46px"></a>
	</div>
		<div class="container">
		<div class="navbar-header">
			<button type="button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#nav-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
			</button>
		</div>
	
		<div class="collapse navbar-collapse" id="nav-collapse">  
			<ul class = "nav navbar-nav navbar-left">
				<li><a href = "#">Home</a></li>
				<li class = "dropdown">
					<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
					Bookings</a>
					<ul class = "dropdown-menu">
						<li><a href = "#">Create A Booking</a></li>
						<li><a href = "#">View My Bookings</a></li>
						<li><a href = "#">View All Bookings</a></li>
					</ul>
				</li>
				<li><a href = "#">Kits</a></li>
				<li><a href = "#">Transfers</a></li>
				<li><a href = "#">Logout</a></li>
			</ul>  
		</div>
    </div> <!-- end container -->
    </nav>
    
    
	<!-- Javascript for bootstrap
	================================================== -->

  </body>
</html>