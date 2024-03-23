<?php
// Define variables


// Define functions
// Connect to database
function connectToDB($server, $username, $password, $dbname='catalyst') {
	$connection = new mysqli($server, $username, $password, $dbname);
	return $connection;
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

// Create Users Table if not exists
function createUsersTable($db) {
	$createTableSQL = "CREATE TABLE IF NOT EXISTS users (
		id INT AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(50),
		surname VARCHAR(50),
		email VARCHAR(100) UNIQUE
	) ENGINE=InnoDB;";

	if (!$db->query($createTableSQL)) {
		die("Error creating table: " . $db->error . "\n");
	}
	echo "Table 'users' created successfully. \n";
}

// Process data from csv file (dry run only OR process and insert)
function processCsvData($fileName, $isDryRun, $db) {
	if(!isset($fileName)) {
		die("File name is missing");
	}

	$filePath = "./" . $fileName;
	if (!file_exists($filePath) || !is_readable($filePath)) {
		die("File does not exist or is not readable");
	}

	$handle = fopen($filePath, "r");

	if ($handle === false) {
		echo "Error in opening file \n";
		exit;
	}

	// Based on sample file, we assume csv always has header and skip header line.
	fgetcsv($handle);

	while (($thisLine = fgetcsv($handle)) !== FALSE) {
		var_dump($thisLine);
	}

}

// Exit if script hasn't being executed from command line
if (php_sapi_name() !== 'cli') {
	die("This script must be executed from the command line only.");
}

// Read command line arguments and take appropriate action
$cliOptions = getopt("u:p:h:", ["file:", "create_table", "dry_run", "help"]);

// Only show help information if requested
if (isset($cliOptions["help"])) {
	displayHelpInfo();
	exit;
}

$db = connectToDB($cliOptions['h'], $cliOptions['u'], $cliOptions['p'], 'catalyst');
if ($db->connect_error) {
	die('Connection failed: ' . $db->connect_error);
} else {
	echo "Database Connection successful \n";
}

// Create users table if cli argument requests
if (isset($cliOptions['create_table'])) {
	createUsersTable($db);
	exit;	// No further action on this command instance
}

// Initiate CSV file processing if requested, we perform both dry run as well as conditional insert into db table in one function
if (isset($cliOptions['file'])) {
	processCsvData($cliOptions['file'], isset($cliOptions['dry_run']), $db);
}



/* TODO: To test and implement the following:
	- Accept -u, -p, -h arguments along with database name (fixed) and connect - DONE
	- Test create_table argument and associated functionality - DONE
	- Test dry_run functionality (i.e. only validate data and not insert)
		* Invalid email error
	- Test validate and insert into database
	- Test file not found error output
*/

?>