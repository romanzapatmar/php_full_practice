<?php

$db = "localhost";
$user = "root";
$pass = "";
$db_name = "phpmysql";

$conn = new mysqli($db, $user, $pass, $db_name);

if($conn ->connect_error){
    die("connection failed : ". $conn ->connect_error);
}
else{
    //echo "connected successfully";
}

//insert data 
// $sql = "INSERT INTO product(product_name, price) VALUES ('machine', 500);";
// $sql .= "INSERT INTO product(product_name, price) VALUES ('JCB', 15000);";
// $sql .= "INSERT INTO product(product_name, price) VALUES ('macCarhine', 17600);";

// if($conn ->multi_query($sql) === TRUE){
//     //$last_id = $conn->insert_id;
//     echo 'New Record Inserted Successfully.';
// }
// else{
//     echo "error:" . $sql . "<br>". $conn->error;
// }

//select data
// $sql = "SELECT id, product_name, price FROM product";
// $result = $conn->query($sql);

// if($result->num_rows > 0) {
//     //output data of each row
//     while($row = $result->fetch_assoc()){
//         echo "id : " .$row["id"]."<br>". " Name : " .$row["product_name"]."<br>". " Price : " .$row["price"]. "<br>";
        
//     }
// }
//     else{
//         echo "Data Not Found";
//     }

    //select with WHERE condition

    $sql = "SELECT id, product_name FROM product WHERE price=15000";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        //output for particular row
        while($row = $result->fetch_assoc()){
            echo "ID : " .$row["id"]. "product_name : " .$row["product_name"]. " ".$row["price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
$conn->close();

?>