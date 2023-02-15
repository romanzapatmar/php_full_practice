<?php
    if(isset($_FILES['image'])){
    //    echo '<pre>';
    //    print_r($_FILES);
    //    echo '</pre>';

       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_tmp= $_FILES['image']['tmp_name'];
       $file_type= $_FILES['image']['type'];

       if(move_uploaded_file($file_tmp, "uploads/" . $file_name)){
        echo 'Upload Successfully';
       }
       else{
           echo 'could Not Upload';
       }
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <!--multipart/form-data ensures that form data is going to be encoded as MIME data-->
        <h2>Upload File</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
        <!-- name of the input fields are going to be used in our php script--> 
    </form>
</body>
</html>