<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JC01";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    echo "Connected successfully";
}



//COURSES
$sql = "CREATE TABLE inquiry (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    email varchar(255) NOT NULL,
    email_subject varchar(255) NOT NULL,
    email_body varchar(255) NOT NULL


    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "inquiry created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
