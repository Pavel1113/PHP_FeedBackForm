<?php
$servername = "feed.back";
$database = "feedback";
$username = "root";
$password = "";

$connection = mysqli_connect($servername, $username, $password, $database);


if (!$connection) {

    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";
?>