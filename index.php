<?php
/*
-------------------------------
-     Copyright (C) 2016      -
-       Imperial Knight       -
-     All rights reserved.    -
-------------------------------

https://github.com/Imperial-Knight/imperial_server_status

*/


include_once( __DIR__ . "/imperial_server_status/imperial_server_status.inc.php" );

$ip_address = "66.150.214.67"; // Example server.
$port       = "27015";

$response_array = $Imperial_Status->ReturnInformation( $ip_address, $port );

$response_status = $response_array["status"];
$response_hostname = $response_array["hostname"];
$response_maxplayers = $response_array["maxplayers"];
$response_connectedplayers = $response_array["connectedplayers"];
$response_map = $response_array["map"];

?>

<html>

	<head>
		<title>Server Status :: Example</title>
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
		<!-- Display the hostname. -->
		<p> <b>Hostname:</b>      <?php echo $response_hostname; ?></p>
		<!-- Display the status of the server. -->
		<p> <b>Server-Status:</b> <?php echo $response_status; ?></p>
		<!-- Display the connected players out of the maximum players. -->
		<p> <b>Players:</b>       <?php echo $response_connectedplayers . " / " . $response_maxplayers; ?></p>
		<!-- Display the map. -->
		<p> <b>Map:</b>           <?php echo $response_map; ?></p>
	</body>
</html>