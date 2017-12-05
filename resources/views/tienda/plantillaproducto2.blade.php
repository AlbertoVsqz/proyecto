<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Mi tienda')</title>
	<!--css-->
	<link href="{{route('/')}}/complementos/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="{{route('/')}}/complementos/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{route('/')}}/complementos/css/font-awesome(2).css" rel="stylesheet">
	<link href="{{route('/')}}/complementos/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{route('/')}}/complementos/css/newstyle.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{route('/')}}/complementos/css/jquery-ui.css">
	<!--css-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="{{route('/')}}/complementos/js/jquery.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!--search jQuery-->
		<script src="{{route('/')}}/complementos/js/main.js"></script>
	<!--search jQuery-->
	<script src="{{route('/')}}/complementos/js/responsiveslides.min.js"></script>
	 <script>
	    $(function () {
	      $("#slider").responsiveSlides({
	      	auto: true,
	      	nav: true,
	      	speed: 500,
	        namespace: "callbacks",
	        pager: true,
	      });
	    });
	 </script>
	 <!--mycart-->
	<script type="text/javascript" src="{{route('/')}}/complementos/js/bootstrap-3.1.1.min.js"></script>
	 <!-- cart -->
	<script src="{{route('/')}}/complementos/js/simpleCart.min.js"></script>
	<!-- cart -->
	  <!--start-rate-->
	  <script defer src="{{route('/')}}/complementos/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="{{route('/')}}/complementos/css/flexslider.css" type="text/css" media="screen" />
<script src="{{route('/')}}/complementos/js/imagezoom.js"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

	  
	<script src="{{route('/')}}/complementos/js/jstarbox.js"></script>
		<link rel="stylesheet" href="{{route('/')}}/complementos/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
			<script type="text/javascript">
				jQuery(function() {
				jQuery('.starbox').each(function() {
					var starbox = jQuery(this);
						starbox.starbox({
						average: starbox.attr('data-start-value'),
						changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
						ghosting: starbox.hasClass('ghosting'),
						autoUpdateAverage: starbox.hasClass('autoupdate'),
						buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
						stars: starbox.attr('data-star-count') || 5
						}).bind('starbox-value-changed', function(event, value) {
						if(starbox.hasClass('random')) {
						var val = Math.random();
						starbox.next().text(' '+val);
						return val;
						} 
					})
				});
			});
			</script>
	<!--//End-rate-->

</head>
<body>

		@if(\Session::has('message'))
		<div class="alert alert-success alert-dismissible text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				
			</button>
			<h2><strong><i class="fa fa-info-circle"></i></strong>{{ \Session::get('message')}}</h2>
			
		</div>
		@endif

		@if(session('sincarrito'))			
			<div class="alert alert-danger alert-dismissible text-center" role="alert">
				
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				
			</button>
				
					<h2 ><strong><i class="fa fa-info-circle"></i></strong>{{session('sincarrito')}}</h2>
					
				
				</div>	
			</div>
		@endif

		@if(session('Status'))			
		<div class="container">
			
			<div class="alert alert-success alert-dismissible text-center" role="alert">
				<br>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				
			</button>
			
				<h2 ><strong><i class="fa fa-info-circle"></i></strong>{{session('Status')}}</h2>
				
			
			</div>	
		</div>
				@endif

		
		
	
		@include('tienda.secciones.header2')

		@yield('content')

		@include('tienda.secciones.footer')
</body>
</html>