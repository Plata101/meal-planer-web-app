<?php
// The class "DatabaseConnection" inherits from the superclass PDO
class DatabaseConnection extends PDO {
    // constructor method: connection to the database is established
    public function __construct($dbHost, $dbUser, $dbPassword, $dbName) {
    	$connection = 'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8';

        // Array for PDO options is created
        $options = array(
        	// Error output in the test phase
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // With this option the results are output in the form of associative arrays (most efficient way to output the results in HTML)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
        	// Calling the constructor of the PDO class (superclass)
			parent::__construct($connection, $dbUser, $dbPassword, $options);
		}
		catch (PDOException $e) {
			die("The connection to the database failed: ".$e->getMessage());
		}
	}
}
?>
