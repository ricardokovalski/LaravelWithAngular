<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dojo Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="http://laravel.com/assets/img/laravel-logo.png" type="image/x-icon">
	<!-- <link rel="icon" href="/favicon.ico" type="image/x-icon"> -->

</head>
<body>
	
	<nav class="navbar navbar-default">
        <div class="container container-fluid">
            <div class="navbar-header">
				<a class="navbar-brand" href="/">
					<strong class="text-uppercase text-primary">Dojo:</strong> Laravel
				</a>
            </div>

            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
                <li><a href="/projects">Produtos</a></li>
<!--                <li><a href="/categoria">Categoria</a></li>
                <li><a href="/noticia">Notícia</a></li>-->
            </ul>
        </div>
    </nav>

	<div class="container container-fluid">
            @yield('content')
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>