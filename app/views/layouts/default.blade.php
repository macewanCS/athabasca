<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EPL</title>
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/main.css')}}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js')}}
    {{ HTML::script('/assets/js/jquery.js')}}
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/css/jquery.dataTables.min.css')}}
	{{ HTML::script('/packages/bootstrap-hover-dropdown.min.js')}}
	{{ HTML::style('css/dropdowncolor.css')}}
    @yield('css1')
    @yield('css2')

  </head>

  <body>
	<nav class="navbar navbar-default">
	<div class="container">
    <br></br>
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
				<li id="home"><a id="homes" href = "/">Home</a></li>
				<li class = "dropdown">
					<a href = "#" id="book" class = "dropdown-toggle" data-toggle = "dropdown" data-hover="dropdown" data-delay="1" data-close-others="false">Bookings</a>
					<ul id="booking" class = "dropdown-menu">
						<li><a id="boo" href = "/createBooking">Create A Booking</a></li>
						<li><a id="booki" href = "/viewuserbooking">View My Bookings</a></li>
						<li><a id="bookin" href = "/viewbooking">View All Bookings</a></li>
					</ul>
				</li>
				<li class = "dropdown">
					<a href = "#" id="kit" class = "dropdown-toggle" data-toggle = "dropdown" data-hover="dropdown" data-delay="1" data-close-others="false">Kit Info</a>
					<ul id="kitinfo" class = "dropdown-menu">
						<li><a id="kiti" href = "/viewkit">Browse Kits</a></li>
            			<li><a id="kitin" href = "#">Add Note to Kit</a></li>
						<li><a id="kitinf" href = "/kitmanage/create">Create a Kit</a></li>
					</ul>
				</li>
				<li class = "dropdown">
					<a href = "#" id="transfer" class = "dropdown-toggle" data-toggle = "dropdown" data-hover="dropdown" data-delay="1" data-close-others="false">Transfers</a>
					<ul id="trans" class = "dropdown-menu">
						<li><a id="transf" href = "/transfers">View My Transfers</a></li>
					</ul>
				</li>
				<li id="logout"><a id="log" href = "/logout">Logout</a></li>
			</ul>
		</div>
    </div> <!-- end container -->
    </nav>

    <div class = "container">
    @if(isset($error))
    <div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        {{$error;}}
      </div> <!--end of message -->
    @endif

		@yield('content')
		@yield('content2')
    </div>


  </body>
</html>
