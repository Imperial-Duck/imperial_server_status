<?php

/*
-------------------------------
-     Copyright (C) 2016      -
-       Imperial Knight       -
-     All rights reserved.    -
-------------------------------

https://github.com/Imperial-Knight/imperial_server_status

*/

class Imperial_Status
{
	var $status;
	var $hostname;
	var $maxplayers;
	var $connectedplayers;
	var $map;

	function ReturnInformation( $ip_address, $port )
	{
		require_once __DIR__ . '/SourceQuery/SourceQuery.class.php'; // Add Source Query Class


		// Server Information
		$SQ_SERVER_ADDR = $ip_address;
		$SQ_SERVER_PORT =  $port;
		
		// Ignore stuff below this line unless you know what you're doing.
		$SQ_TIMEOUT = 1;
		$SQ_ENGINE = "SourceQuery :: SOURCE";


		$Query = new SourceQuery( );
		error_reporting( 0 );
			$Query->Connect( $SQ_SERVER_ADDR, $SQ_SERVER_PORT, $SQ_TIMEOUT, $SQ_ENGINE );
			
			$Info = $Query->GetInfo( ); // General information such as map, max players, hostname, etc.
			$Players = $Query->GetPlayers( ); // General player information such as count and a player list/
		error_reporting( E_ALL );

		if( $Info["HostName"] == "" ) {
			$this->status = "<span style=\"color: red;\">Offline</span>";
			$this->hostname = "Unknown";
			$this->maxplayers = "Unknown";
			$this->connectedplayers = "Unknown";
			$this->map = "Unknown";
				} else {
					$this->hostname = $Info['HostName'];
					$this->maxplayers = $Info['MaxPlayers'];
					$this->connectedplayers = count($Players);
					$this->map = $Info['Map'];
					$this->status = "<span style=\"color: green;\">Online</span>";
				}

		$Query->Disconnect( );
		$informationArray = array(
			"status" => $this->status,
			"hostname" => $this->hostname,
			"maxplayers" => $this->maxplayers,
			"connectedplayers" => $this->connectedplayers,
			"map" => $this->map,
		);
		return( $informationArray );
	}
}

?>
