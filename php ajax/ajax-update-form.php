<?php

$customerId = $_POST["id"];
$fname = $_POST["first_name"];
$lname = $_POST["last_name"];


$conn = mysqli_connect('localhost', 'root', '', 'test') or die('connection failed');

$sql = "UPDATE  tbl_customer SET first_name = '{$fname}', last_name = '{$lname}' WHERE id = {$customerId}";

if(mysqli_query($conn, $sql)){
    echo 1;
}
else{
    echo 0;
}


?>