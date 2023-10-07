<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" /><link rel="shortcut icon" href="https://verointernet.com.br/wp-content/themes/vero/favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Vero Nike
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/material/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/material/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
	@include('layouts.includes.sidebar')
	<div class="main-panel">
		@include('layouts.includes.navbar')
		@yield('content')
		@include('layouts.includes.footer')		
	</div>
	</div>
</body>
</html>
