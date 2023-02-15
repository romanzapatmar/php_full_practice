<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <h1>This is heading</h1>


    <?php
    //fetching REST API in PHP using dummy rest api example website

$api_url = 'https://dummy.restapiexample.com/api/v1/employees';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0, 9);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data
foreach ($user_data as $user) {
	echo "name: ".$user->employee_name;
	echo "<br />";
	echo "Age: ".$user->employee_age;
	echo "<br /> <br />";
}

?>

    <script src="assets/js/jquery_new.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>