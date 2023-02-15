<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Serialize Form Data</title>
</head>
<body>
    <div class="container justify-content-center">
        <form id="submit-form">
            <div class="mb-3 col-md-4">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="fullname" id="fullname">
            </div>
            <div class="mb-3 col-md-4">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="age">
            </div>
            <div class="mb-3 col-md-4">
                <label for="gender">Gender : </label>
                    <input class="form-check-input" name="gender" type="radio" value="male" checked> Male
                    <input class="form-check-input" name="gender"  type="radio" value="female"> Female
            </div>
           
            <div class="mb-3 col-md-4">
                <select class="form-select" name="country">
                    <option value="ind">India</option>
                    <option value="pak">Pakistan</option>
                    <option value="jpn">Japan</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
        </form>
        <div id="response"></div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            //to save form
            $("#submit").on("click", function() {
                var fullname = $("#fullname").val();
                var age = $("#age").val();
                if(fullname == "" || age == "" || !$('input:radio[name=gender]').is(':checked')){
                    //alert('please fill the form');
        
                    $('#response').fadeIn();
                    $('#response').removeClass('alert alert-success').addClass('alert alert-danger').html('All Fields are required');
                }
                else{
                    //alert('ok');
                    //$("#response").html($("#submit-form").serialize());
                    $.ajax({
                        url : 'ajax-insert.php',
                        type : 'POST',
                        data : $("#submit-form").serialize(),
                        success: function(data) {
                            //alert(data);
                            $("#submit-form").trigger("reset");
                             $('#response').fadeIn();
                             $('#response').removeClass('alert-danger').addClass('alert-success').html(data);
                            setTimeout(function() {
                                $('#response').fadeOut("slow");
                            }, 4000);
                
                        }
                    });
                }
            });
        });

    </script>

</body>
</html>