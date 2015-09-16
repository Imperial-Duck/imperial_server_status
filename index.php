<?php
error_reporting(0);
include 'functions.php';

?>

<html>

<head>
	<title>Server Status</title>
</head>

	<!-- General Styling -->
	<style>
	body html {
		font-family: sans-serif, arial;
	}
	</style>


<body>
<h2>Server Status</h2>
<br/>
<p><b>Hostname:</b> <?php if(isset($hostname)) { echo $hostname; } ?></p>
<p><b>Server-Status:</b> <?php echo $status; ?></p>
<p><b>Players:</b> <?php if(isset($connectedplayers)) { echo $connectedplayers; } ?> / <?php if(isset($maxplayers)) { echo $maxplayers; } ?></p>
<p><b>Map:</b> <?php if(isset($map)) { echo $map; } ?></p>
</body>

</html>