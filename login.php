<?php
	
require_once("adLDAP.php");
require_once("ldapconfig.php");

$username = strtolower($_POST['username']);
$password = stripslashes($_POST['password']);

if($username == '' || $password == '') {
	header("Location: index.php?missingfields=true");
	exit();
}

$verifyLogin = new adLDAP($ldapCFG);
	
if(!$verifyLogin->authenticate($username, $password)) {
	header("Location: index.php?invalid=true");
	exit();
} else {
	session_save_path("/var/www/html/cs383/sessions/");
	session_start();
	$_SESSION['username'] = $_POST['username'];
	session_write_close();
	header("Location: form.php");
	exit();
}

?>