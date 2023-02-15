<?php

    $conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");
   // print_r($conn);exit;
    $limit = 5;
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }
    else{
        $page = 0;
    }
    $sql = "SELECT * FROM tbl_customer LIMIT {$page}, $limit";
   
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    //print_r($result); exit;

    if(mysqli_num_rows($result) > 0){
        $output = "";
        $output .= "<tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $serial_no = $page++;
            $last_id =  $serial_no;
            //$last_id++;
            $output .="<tr><td class='text-center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td></tr>";
        }
        $output .= "</tbody>
        <tbody id='pagination'>
            <tr>
                <td colspan='2'>
                    <button id='ajaxBtn' data-id='{$page}' class='btn btn-primary'>Load more</button>
                </td>
            </tr>
        </tbody>";
        //$serial_no++;
        echo $output;
        
    }
    else{
        echo "";
    }

    mysqli_close($conn);

 
?>