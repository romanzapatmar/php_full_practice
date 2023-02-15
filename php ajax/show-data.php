<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>php ajax</title>
</head>
<body>
    <table id="main">
        <tr>
            <td id="header">
                <h1>PHP with AJAX</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                <input class="btn btn-primary" type="button" id="load-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <!-- <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Roman</td>
                    </tr>
                </table> -->
            </td>
        </tr>
    </table>
    

    
    <script src="js/jquery_original.js"></script>
    <script>
       
        $(document).ready(function() {
            $("#load-button").on("click", function(e) {
                $.ajax({
                //alert('Hello');
                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data) {
                        $("#table-data").html(data);
                    }
                });           
            });     
        });
    </script>
</body>
</html>