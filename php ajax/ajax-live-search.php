<?php

$search_value = $_POST['search'];

$conn = mysqli_connect('localhost', 'root', '', 'test') or die('connection failed');

$sql = "SELECT * FROM tbl_customer WHERE first_name LIKE '%{$search_value }%' OR last_name LIKE '%{$search_value }%'";
$result = mysqli_query($conn, $sql) or die('SQL Query Failed.');
$output = '';
if(mysqli_num_rows($result) > 0){
    $output = "<table class='table table-stripped' border=1>
                    <tr>
                        <th width='100px'>ID</th>
                        <th>Name</th>
                        <th width='100px' colspan='2'>Action</th>
                    </tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        $output .= 
                                    "<tr>
                                        <td>{$row["id"]}</td>
                                        <td>{$row["first_name"]} {$row["last_name"]}</td>
                                        <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#edit' id='editBtn' data-eid='{$row["id"]}'>Edit</button>
                                        <button class='btn btn-danger' id='deleteBtn' data-id='{$row["id"]}'>Delete</button></td>
                                    </tr>";
                    }
        $output .= "</table>";

        mysqli_close($conn);

        echo $output;
}else{
   
    echo "<h2>No Record Found</h2>";

}



?>