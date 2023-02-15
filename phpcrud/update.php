<?php
include('connect.php');
$id = $_GET['updateid'];
$sql = "select * from `test` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    //insert query
    $sql = "update `test` set id = '$id', name = '$name', email = '$email',
     mobile = '$mobile', password = '$password 'WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        // echo '<div class="alert alert-success" role="alert">
        //     you update Data
        //     </div>';
        //header('location:display.php');
  
    }
    else{
        die(mysqli_error($conn));
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <h1>Edit Here</h1>
        <form method="POST">
            <div class="col-md-6">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
            </div>
            <div class="col-md-6">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="col-md-6">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password;?>">
            </div>
            
            <button type="submit" class="btn btn-primary" name ="submit">Submit</button>
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>