<?php
// Include the file with the Connection class definition
require_once 'Connection/Connection.php'; // Update with the actual filename

try {
    // Call the getDB method to establish a connection
    $db = Connection::getDB();
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
}
?>
