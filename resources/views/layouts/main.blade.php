<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('/') }}bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}css/lib/lobipanel/lobipanel.min.css">
<link rel="stylesheet" href="{{ asset('/') }}css/separate/vendor/lobipanel.min.css">
<link rel="stylesheet" href="{{ asset('/') }}css/lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" href="{{ asset('/') }}css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/main.css">
<script src="{{ asset('/') }}js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('/') }}js/lib/popper/popper.min.js"></script>
	<script src="{{ asset('/') }}js/lib/tether/tether.min.js"></script>
	<script src="{{ asset('/') }}js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="{{ asset('/') }}js/plugins.js"></script>

	<script type="text/javascript" src="{{ asset('/') }}js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="with-side-menu control-panel control-panel-compact">
	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="img/logo-2.png" alt="" style="visibility:hidden">
	            <img class="hidden-lg-down" src="img/logo-2-mob.png" alt="" style="visibility:hidden">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    
	             
	                    
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
	                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Dashboard</span>
	            </span>
	            <ul>
	                <li><a href="{{Route('home')}}"><span class="lbl">Home</span></a></li>
	               

	            </ul>
	        </li>
	        <!--li class="blue with-sub opened">
	            <span>
	                <i class="font-icon font-icon-user"></i>
	                <span class="lbl">Doctor</span>
	            </span>
	            <ul>
	                <li><a href="{{Route('doctorList')}}"><span class="lbl">List</span></a></li>
	                
	            </ul>
	        </li-->
	      
	     <!--   <li class="gold">
	            <a href="#">
	                <i class="font-icon font-icon-speed"></i>
	                <span class="lbl">Performance</span>
	            </a>
	        </li>-->


	
	    
	</nav><!--.side-menu-->

  
  
        @yield('content')
  
  
  
  
  
  

    <!-- Scripts -->
    <script src="{{ asset('/app2.js') }}"></script>
<script>
$(function(){
    var current = location;
    $('#nav li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})
</script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title mtitle">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body mbody">
        <form method="post" action="{{Route('createDoctor')}}"  class="tagForm" enctype="multipart/form-data">
				{!! csrf_field() !!}
					<div class="form-group row apnd">
					<div class="col-sm-12">
				<a type="button"  class="addTags tabledit-edit-button btn btn-sm btn-default pull-right"  href="javascript:void(0)" data-id=""><span class="glyphicon glyphicon-plus"></span></a>
				</div>
				</div>
					<div class="form-group row">
						
    <div class="col-sm-9">
        <p class="form-control-static"><input type="text" class="form-control" id="tagName" name="tagName[]" value="" placeholder="Tag Name" style="" required /></p>
    </div>
    <div class="col-sm-3">
        <a type="button" class="del tabledit-edit-button btn btn-sm btn-default pull-right" href="javascript:void(0)" data-id=""><span class="glyphicon glyphicon-trash"></span></a>
    </div>


					</div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>
