<?php

$conn = mysqli_connect('localhost', 'root', '', 'test') or die('connection failed');

$fullname = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "INSERT INTO tbl_details(fullname, age, gender, country) VALUES ('{$fullname}', '{$age}', '{$gender}', '{$gender}')";

if(mysqli_query($conn, $sql)){
    echo "Hello {$fullname} your record is saved successfully";
}
else{
    echo "Not saved!";
}


?>