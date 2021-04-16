<!DOCTYPE html>
<html>
<head>

	<title>App de tareas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" >
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200;300&display=swap" rel="stylesheet">
<link rel="icon" href="{{url('css/img/icon.ico')}}">

</head>

<body>
<video src="https://css-tricks-post-videos.s3.us-east-1.amazonaws.com/blurry-trees.mov" autoplay loop playsinline muted></video>

@include('layouts.nav')
 
@yield('content')
<!-- Javascript Bootstrap -->

</body>

</html>