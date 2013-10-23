<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content"IE=edge,chrome=1">
		<meta name ="viewport" content="width=device-width, initial-scale=1.0">

		<title>De Keyser AutoParts</title>
	
		<!-- Latest compiled and minified CSS -->

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/libraries/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
		

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">

		
		<link rel="stylesheet" href="/assets/css/style.css">
		<link rel="stylesheet" href="/assets/libraries/thumbnail/css/component.css">
		<link rel="stylesheet" href="/assets/libraries/thumbnail/css/default.css">

	</head>

<body>
<div class="menu">
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="#"><img class="logo" src="/assets/images/logo.jpg" /></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
   
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Particulier</a></li>
      <li><a href="#">Klant</a></li>
      @if (Auth::check())
		<li class="pull-right"><a href="{{ URL::to('logout')}}">Logout</a></li>
		@else
		<li><a href="{{ URL::route('login') }}">Admin</a></li>
		@endif
     </ul>

  </div><!-- /.navbar-collapse -->
</nav>
</div>


	
	@yield('content')
	

	<footer class="site-footer">
	<div class="footercontent">
	</div>


	</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/assets/libraries/thumbnail/js/modernizr.custom.js"></script>
<script src="/assets/libraries/thumbnail/js/grid.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/assets/libraries/bootstrap-wysihtml5/js/wysihtml5-0.3.0.js"></script>
<script src="/assets/libraries/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>

<script>
			$(function() {
				Grid.init();
			});
		</script>
<script>
$('#inputTextarea').wysihtml5({
	"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
	"emphasis": true, //Italics, bold, etc. Default true
	"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
	"html": false, //Button which allows you to edit the generated HTML. Default false
	"link": true, //Button to insert a link. Default true
	"image": false, //Button to insert an image. Default true,
	"color": false //Button to change color of font  
});
</script>



</body>
</html>