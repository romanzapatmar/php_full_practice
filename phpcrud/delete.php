<?php

include 'connect.php';

if(isset($_GET['deleteid'])){

    $id = $_GET['deleteid'];


    $sql = "delete from `test` where id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
    //     echo '<div class="alert alert-success" role="alert">
    //     You Deleted data
    //   </div>';
        header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }
}


?>