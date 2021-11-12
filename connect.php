<?php
$servername = "localhost";
$username = "tahira";
$password = "tahira033#";
$database = "leaderboard";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn-> connect_error){
    die("unable to connect to host " .$conn->connect_error);
} 

?>