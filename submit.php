<?php

session_save_path("/var/www/html/cs383/sessions/");
session_start();

$username = $_SESSION['username'];

if($username != '') {
	$filepath = "/var/www/html/cs383/submissions/$username.txt";
	
	$fp = fopen($filepath, "a");
	
	fwrite($fp, $username . "\n");
	fwrite($fp, date("r") . "\n");
	
	$allanswerssubmitted = true;
	
	for($x = 1; $x <= $_POST['nquestions']; $x++) {
		if(trim($_POST['question'][$x]) == '')
			$allanswerssubmitted = false;
	
		fwrite($fp, $_POST['question'][$x] . "\n");
	}
	
	fwrite($fp, "\n");
	fwrite($fp, "\n");
	fwrite($fp, "\n");
	
	fclose($fp);
	chmod($filepath, 0700);
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>MTH 232 Test Submission</title>
	</head>
	<body>
		<div class="container">
			<h1>MTH 232 Test Submission</h1>
			
			<?php
			
			if($username == '') {
				echo "		<div class=\"alert alert-danger\">\n";
				echo "			You have did not supply a username. Your responses are below.\n";
				echo "		</div>\n";
			} else if($allanswerssubmitted) {
				echo "		<div class=\"alert alert-success\">\n";
				echo "			You have successfully submitted your exam. Your responses are below.\n";
				echo "		</div>\n";
			} else {
				echo "		<div class=\"alert alert-warning\">\n";
				echo "			You have not submitted all answers. One or more questions was left blank. Your responses are below.\n";
				echo "		</div>\n";
			}
			
			?>
			<ol type="1">
				<?php
				for($x = 1; $x <= $_POST['nquestions']; $x++)
					echo "<li>{$_POST['question'][$x]}</li>\n";
				?>
			</ol>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>