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
		<link rel="stylesheet" href="/assets/libraries/wysiwyg/index.css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="/assets/libraries/select2/select2.css">
		<link rel="stylesheet" type="text/css" href="/assets/js/fullpage/jquery.fullPage.css" />

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/fullpage/jquery.fullPage.js"></script>
	<script type="text/javascript" src="/assets/js/fullpage/examples/examples.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var pepe = $.fn.fullpage({
				slidesColor: ['#F47622', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu'
			});
			
		});
	</script>

	</head>

<body>

	<div id="header"> 
		<div class="menu">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul id="itemsmenu" class="nav navbar-nav navbar-right">
					<li><a href="#">Particulier</a></li>
					<li><a href="#">Klant</a></li>
					@if (Auth::check())
					    <li class="pull-right"><a href="{{ URL::to('logout')}}">Logout</a></li>
					@else
					    <li><a href="{{ URL::route('login') }}">Admin</a></li>
					@endif
				</ul>
			</div>
		</div><!-- /.navbar-collapse -->
    </div>
	<div id="footer">Footer</div>

	
	@yield('content')
</body>
	

	
<script src="/assets/libraries/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/assets/libraries/thumbnail/js/modernizr.custom.js"></script>
<script src="/assets/libraries/thumbnail/js/grid.js"></script>
<script src="/assets/js/sonic.js"></script>
<script src="/assets/js/simple-gallery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/assets/libraries/wysiwyg/bootstrap-wysiwyg.js"></script>
<script src="/assets/libraries/wysiwyg/external/jquery.hotkeys.js"></script>
<script src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/libraries/select2/select2.js"></script>
<script src="/assets/js/xml2json.js"></script>
<script src="/assets/js/jquery.xdomainajax.js"></script>




<script>
			$(function() {
				Grid.init();
			});
</script>

<script>
	$(document).ready(function(){
    // when the page load >>> get div value and put in textarea
   $('#MyTextArea').val($('#editor').html());
   // when used the editor and clicked out >>> get div value and put in textarea
   $('#Myform').focusout(function() {
        $('#MyTextArea').val($('#editor').html());
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){

@section('scripts')
@show

@yield('scriptsremove')

@yield('scriptsdocuments')

@yield('scriptstags')

});
</script>

<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>



</body>
</html>