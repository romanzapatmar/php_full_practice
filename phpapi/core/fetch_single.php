<?php

    include 'fetch_all.php';
    header('Content-Type : application/json');  

    $sql = "SELECT * FROM demo";
    $result = mysqli_query($sql, $conn) or die("Mysql Query Failed");

    if(mysqli_num_rows($result) > 0)
    {
        $output = mysqli_fetch_all($result, MYSQL_ASSOC);
        echo json_encode($output);

    }else {
        echo json_encode(array('message' => 'No Records Found', 'status' => false));
    }

?>