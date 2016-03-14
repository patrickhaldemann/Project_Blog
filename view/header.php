<!DOCTYPE html>
<html lang="de">
<head>
<link type="img.png" rel="icon" href="view/Pictures/icon.png"/>
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
<link href="/view/css/style.css" rel="stylesheet">
<!-- Einbindung JQuery -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Einbindung Bootstrap Javascript -->
<script type="text/javascript" language="javascript"
	src="view/js/bootstrap.min.js"></script>

</head>
<body>
<img alt="Header_Bild" src="/view/Pictures/Header_Lol.png">
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
				<a class="navbar-brand">League of Legends Blog</a>
			</div>
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class=""><a href="/">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="/blog/allBlogs">All Blogs</a></li>
					<?php
					if (isset ( $_SESSION ['id'] )) {
						echo '<li><a href="/user/myAccount">My Account</a></li>';
					}
					?>
					<li><a href="/impressum/about">About</a></li>
					<?php
					if(isset ( $_SESSION ['IsAdmin'] ))
					{
						if ($_SESSION['IsAdmin'] == 1)
						{
							echo '<li><a href="/blog/create">Create Blog</a></li>';
							echo '<li><a href="/user">Users</a></li>';
						}
					}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
			<?php
			if (isset ( $_SESSION ['id'] )){
				echo '<li><a href="/user/signout">Sign Out</a></li>';
			}
			else{
				echo '<li><a href="/user/create">Sign Up</a></li>';
				echo '<li><a href="/user/login">Login</a></li>';
			}
			?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container">

		<h1><?= $heading ?></h1>