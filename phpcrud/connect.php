<?php

$conn = mysqli_connect('localhost', 'root', '', 'phpcrud');

if($conn)
{
   // echo 'success';

}
else{
    die(mysqli_error($conn));
}



?>