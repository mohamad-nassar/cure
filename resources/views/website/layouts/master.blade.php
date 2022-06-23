<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Jthemes">
		<meta name="description" content="MedService - Medical & Medical Health Landing Page Template">
		<meta name="keywords" content="Responsive, HTML5 Template, Jthemes, One Page, Landing, Medical, Health, Healthcare, Doctor, Clinic, Care, Hospital">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

  		<!-- SITE TITLE -->
		<title>Home</title>

		<!-- FAVICON AND TOUCH ICONS  -->
		<link rel="shortcut icon" href="images/favicon-1.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon-1.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152-1.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120-1.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76-1.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon-1.png">

		<!-- GOOGLE FONTS -->
		<link href="{{ ('../../../../../css-2?family=Roboto:300,400,500,700,900') }}" rel="stylesheet">
		<link href="{{ ('../../../../../css-3?family=Lato:400,700,900') }}" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('frontend/css/bootstrap.min-1.css') }}" rel="stylesheet">

		<!-- FONT ICONS -->
		<link href="{{ asset('../../../../../releases/v5.7.2/css/all-1.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" crossorigin="anonymous">
		<link href="{{ ('frontend/css/flaticon-1.css') }}" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="{{ asset('frontend/css/menu-1.css') }}" rel="stylesheet">
		<link id="effect" href="{{ asset('frontend/css/dropdown-effects/fade-down-1.css') }}" media="all" rel="stylesheet">
		<link href="{{ asset('frontend/css/magnific-popup-1.css') }}" rel="stylesheet">
		<link href="{{ asset('frontend/css/owl.carousel.min-1.css') }}" rel="stylesheet">
		<link href="{{ asset('frontend/css/owl.theme.default.min-1.css') }} " rel="stylesheet">
		<link href="{{ asset('frontend/css/animate-1.css') }} " rel="stylesheet">
		<link href="{{ asset('frontend/css/jquery.datetimepicker.min-1.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.css" integrity="sha512-LKG0Zi6duJ5mwncLtQVchN0iF8fWmcxApuX9pqGq7ITgwQDWR9EqZFsrV9TXfE9pPRa1J6GVnsBl7gKxAyllaA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- TEMPLATE CSS -->
		<link href="{{ asset('frontend/css/style-1.css') }}" rel="stylesheet">

		<!-- RESPONSIVE CSS -->
		<link href="{{ asset('frontend/css/responsive-1.css') }}" rel="stylesheet">

	</head>




	<body>

@include('layouts.header')
@yield('content')
@include('layouts.footer')




		<!-- EXTERNAL SCRIPTS
		============================================= -->
		<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.easing.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
		<script src="{{ asset('frontend/js/menu.js') }}"></script>
		<script src="{{ asset('frontend/js/sticky.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.scrollto.js') }}"></script>
		<script src="{{ asset('frontend/js/materialize.js') }}"></script>
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
		<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
		<script src="{{ asset('frontend/js/hero-form.js') }}"></script>
		<script src="{{ asset('frontend/js/contact-form.js') }}"></script>
		<script src="{{ asset('frontend/js/comment-form.js') }}"></script>
		<script src="{{ asset('frontend/js/appointment-form.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.datetimepicker.full.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('frontend/js/wow.js') }}"></script>

		<!-- Custom Script -->
		<script src="{{ asset('frontend/js/custom.js') }}"></script>

		<script>
			new WOW().init();
		</script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!-- [if lt IE 9]>
			<script src="js/html5shiv.js" type="text/javascript"></script>
			<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif] -->

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
		<!--
		<script>
			window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
			ga('create', 'UA-XXXXX-Y', 'auto');
			ga('send', 'pageview');
		</script>
		<script async src='https://www.google-analytics.com/analytics.js'></script>
		-->
		<!-- End Google Analytics -->

		<script src="{{ ('frontend/js/changer.js') }}"></script>
		<script defer="" src="{{ ('frontend/js/styleswitch.js') }}"></script>


	</body>



</html>

