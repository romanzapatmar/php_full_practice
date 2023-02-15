<?php

$customerId = $_POST['id'];

$conn = mysqli_connect('localhost', 'root', '', 'test') or die('connection failed');

$sql = "SELECT * FROM tbl_customer WHERE id = {$customerId}";
$result = mysqli_query($conn, $sql) or die('SQL Query Failed.');
$output = "";
if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){
                
                 $output .= " <div class='modal-dialog'>
                 <div class='modal-content'>
                    <div class='modal-header'>
                        <h3 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h3>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                            <form>
                                <div class='mb-3'>
                                    <label for='editfname' class='form-label'>First Name</label>
                                    <input type='text' class='form-control' value='{$row["first_name"]}' id='editfname'>
                                    <input type='hidden' class='form-control' value='{$row["id"]}' id='editid'>
                                </div>
                                <div class='mb-3'>
                                    <label for='editlname' class='form-label'>Last Name</label>
                                    <input type='text' class='form-control' value='{$row["last_name"]}' id='editlname'>
                                </div>
                            </form>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='submit' id='updateBtn' class='btn btn-primary'>Update</button>
                            </div>
                        </div>
                    </div>";
                    }
                
        mysqli_close($conn);

        echo $output;
                    }else{
   
    echo "<h2>No Record Found</h2>";

}



?>