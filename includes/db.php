<?php
	
	if ($host == 'localhost') {
	  // Local database credentials
	  $dbhost = "localhost";
	  $dbuser = "root";
	  $dbpass = "root";
	  $dbname = "myfinewine";
	}
	else {
	  // Remote database credentials
	  $dbhost = "localhost";
	  $dbuser = "ryanvan4_wine";
	  $dbpass = "winewinewine";
	  $dbname = "ryanvan4_myfinewine";
	}

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {
		die ("database connection failed: " .
			mysqli_connect_error() .
			"(".mysqli_connect_errno().")"
		);

	}

	/* change character set to utf8 */
	if (!mysqli_set_charset($connection, "utf8")) {
	    exit();
	} 
?>
