<?php

$servername = "localhost";
$username = "root";
$pass = "";
$db = "php";

$conn = mysqli_connect($servername, $username, $pass, $db);

if(!$conn) {
    echo "Not connected";
}
else{
    //echo "successfully connected database";
}

?>