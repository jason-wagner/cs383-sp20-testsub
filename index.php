<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>MTH 232 Test Submission</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}
			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
			html, body {
				height: 100%;
			}
			body {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: center;
				align-items: center;
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #f5f5f5;
			}
			.form-signin {
				width: 100%;
				max-width: 330px;
				padding: 15px;
				margin: auto;
			}
			.form-signin .checkbox {
				font-weight: 400;
			}
			.form-signin .form-control {
				position: relative;
				box-sizing: border-box;
				height: auto;
				padding: 10px;
				font-size: 16px;
			}
			.form-signin .form-control:focus {
				z-index: 2;
			}
			.form-signin input[type="email"] {
				margin-bottom: -1px;
				border-bottom-right-radius: 0;
				border-bottom-left-radius: 0;
			}
			.form-signin input[type="password"] {
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
		</style>
	</head>
	<body class="text-center">
		<form class="form-signin" method="post" action="login.php">
			<h1 class="h3 mb-3 font-weight-normal">MTH 232 Test Submission</h1>
			<?php
			
			if(array_key_exists('missingfields', $_GET) && $_GET['missingfields']) {
				echo "<div class=\"alert alert-danger\">\n";
				echo "You did not fill in all of the fields.\n";
				echo "</div>\n";
			} else if(array_key_exists('invalid', $_GET) && $_GET['invalid']) {
				echo "<div class=\"alert alert-danger\">\n";
				echo "Your username/password combination was incorrect.\n";
				echo "</div>\n";
			} else if(array_key_exists('notloggedin', $_GET) && $_GET['notloggedin']) {
				echo "<div class=\"alert alert-danger\">\n";
				echo "You are not logged in.\n";
				echo "</div>\n";
			}
			
			?>
			<label for="inputEmail" class="sr-only">Username</label>
			<input type="text" id="inputEmail" name="username" class="form-control" placeholder="firstname.lastname" autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="password">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
	</body>
</html>
