<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title ?></title>
<!-- Einbindung Bootstrap -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">
<!-- Einbindung eigenes CSS -->
<link href="view/css/style.css" rel="stylesheet">
<!-- Einbindung JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Einbindung Bootstrap Javascript -->
<script type="text/javascript" language="javascript" src="view/js/bootstrap.min.js"></script>

</head>
<body>
	<!-- Header-Navigationsbar mit Haupt und unter Menüpunkten -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand">LoL</a>
			</div>
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class=""><a href="/">Home <span class="sr-only">(current)</span></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Blogs <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">All Blogs</a></li>
							<li><a href="#">Categories:</a></li>
							<ul>
								<li><a href="#">Patch-Notes</a></li>
								<li><a href="#">Champions</a></li>
								<li><a href="#">ESport</a></li>
							</ul>
						</ul></li>
						<li><a href="/user">My Account</a></li>
						<li><a href="#">About</a></li>
				</ul>
				</ul>
				<ul class="nav navbar-nav navbar-right">
            <li><a href="/user/create">Sign Up</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container">

		<h1><?= $heading ?></h1>