<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>BookGuide</title>
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- MDB Kit -->
	<link rel="stylesheet" href="{{ asset('main/css/mdb.min.css') }}">
	<!-- Normalize Css -->
	<link rel="stylesheet" href="{{ asset('main/css/normalize.css')}}">
	<!-- FontAwesome Pro-->
	<link rel="stylesheet" href="{{ asset('main/css/all.min.css')}}">
	<!--- Custom Css --->
	<link rel="stylesheet" href="{{ asset('web/css/custom.css')}}">
	@yield('style')

</head>
<body>

	@include('web.includes.header')


	@yield('content')


	@include('web.includes.footer')

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('main/js/mdb.min.js')}}"></script>
	<!-- Custom JS -->
	@yield('script')
	
</body>
</html>