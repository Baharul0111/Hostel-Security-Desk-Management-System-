<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Hostel_Security_Desk_Management_System";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
