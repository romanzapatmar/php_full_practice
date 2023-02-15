<?php
require_once('db.php');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo json_encode($demoarray);
}
elseif($_SERVER['REQUEST_METHOD'] == "POST"){
    echo json_encode($demoarray);

}
else{
    http_response_code(405);
}

?>