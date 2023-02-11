<?php
session_start();
//The start of the login session
if (!isset($_SESSION['user'])) {
	//If user is yet to log in, user will be moved to this file
	header('Location: index.html');
	exit();
}
?>

<!-- WEB SECURITY -->
<head>

<!-- Redirect to HTTPS -->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- Prevent Cross-Site Scripting (XSS) -->
<meta http-equiv="X-XSS-Protection" content="1; mode=block">
<!-- Prevent browsers from interpreting files as a different MIME type -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<!-- Prevent site from being embedded in an iframe / prevent clickjack -->
<meta http-equiv="X-Frame-Options" content="DENY">
<!-- Prevents Cross-Site SCripting (XSS) and code injections -->
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline';">

</head>
