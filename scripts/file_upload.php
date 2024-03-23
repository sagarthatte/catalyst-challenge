<?php
// Define variables
$serverName = "localhost";
$userName = "root";
$password = "*****";

// Define functions
// Connect to database
function connectToDB($server, $username, $password) {
	$conn = mysqli_connect($server, $username, $password);
	if (!$conn) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connection successful!";
	}
}

// Display help info
function displayHelpInfo() {
	/*
		The PHP script should include these command line options (directives):
			• --file [csv file name] – this is the name of the CSV to be parsed
			• --create_table – this will cause the MySQL users table to be built (and no further
			• action will be taken)
			• --dry_run – this will be used with the --file directive in case we want to run the script but not insert
			into the DB. All other functions will be executed, but the database won't be altered
			• -u – MySQL username
			• -p – MySQL password
			• -h – MySQL host
			• --help – which will output the above list of directives with details.
	*/
	$helpInfo = "";
	$helpInfo .= "Usage: php user_upload.php [options] \n";
	$helpInfo .= "--file [csv file name]	Name of the CSV file to be parsed \n";
	$helpInfo .= "--create_table		Will create the MYSQL users table(and no further action will be taken) \n";
	$helpInfo .= "--dry_run		To be used with the --file directive.This will only validate data but not insert into database \n";
	$helpInfo .= "-u			MYSQL username \n";
	$helpInfo .= "-p			MYSQL password \n";
	$helpInfo .= "-h			MYSQL host \n";
	$helpInfo .= "-- help			Display all the help information";

	echo $helpInfo;
}


// First we always connect to database?
//connectToDB($serverName, $userName, $password);
displayHelpInfo();

// Fetch input from CLI

// Based on input, do the needful
// If --help is seen, return or print help information


?>