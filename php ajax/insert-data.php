<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Insert Data with Ajax</title>
</head>
<body>
     <div class="container">
    <table id="main">
        <tr>
            <td id="header">
                <h1>Add Record with PHP AJAX</h1>
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="col-md-8">
                    <label for="search" class="form-label">Search</label>
                    <input type="input" class="form-control" id="search" autocomplete="off" placeholder="search here">
                </div>
            </td>
        </tr>    
            <div class="col-md-4 alert alert-success"></div>
            <div class="col-md-4  alert alert-danger"></div>    

            <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editfname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="editfname">
                    </div>
                    <div class="mb-3">
                        <label for="editlname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="editlname">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
                </div>
                </div>
            </div>
        </div>
        <tr>
            <td id="table-form">
                <form id="addForm">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname">
                    </div>
                    <button type="submit" class="btn btn-primary" id="save-button">Submit</button>
                </form>
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

    </div>       
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            //Load-Table Records
            function loadTable() {
                $.ajax({
                //alert('Hello');
                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data) {
                        $("#table-data").html(data);
                    }
                });           
            }
            loadTable();

            //for insert record
            $("#save-button").on("click", function(e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                if(fname == "" || lname == ""){
                    $('.alert-danger').html("All fields are required").slideDown();
                    $('.alert-success').slideUp();
                }
                else{

                    $.ajax({
                    url : "ajax-insert.php",
                    type : "POST",
                    data : {first_name:fname, last_name:lname},
                    success : function(data){
                        if(data == 1){

                            loadTable();
                            $('#addForm').trigger('reset');
                            $('.alert-success').html("Data Insert Successfully").slideDown();
                            $('.alert-danger').slideUp();
                        }
                        else{
                            //.alert('cannot save data');
                            $('.alert-danger').html("cannot save data").slideDown();
                            $('.alert-success').slideUp();
                        }
                    }
                });

                }
               
                
            });

            //delete record
            $(document).on("click", "#deleteBtn", function() {
                var customerId = $(this).data("id");
                var element = this;
                //alert(customerId);

                $.ajax({
                    url : "ajax-delete.php",
                    type : "POST",
                    data : {id : customerId},
                    success : function(data) {
                        //alert(data);
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                        }else{
                            $('.alert-danger').html("Cannot Delete Record").slideDown();
                            $('.alert-success').slideUp();
                        }
                    }

                });
            });
            //update record
            $(document).on("click", "#editBtn", function() {
              //alert('ok');
              var customerId = $(this).data("eid");
              //alert(customerId);
                $.ajax({
                    url:'load-update-form.php',
                    type :  'POST',
                    data : {id : customerId},
                    success : function (data){

                        $("#edit").html(data);
                        
                    }
                });
            });
            //save-update form
            $(document).on("click", "#updateBtn", function() {
                // alert('ok');
                //$('#edit').hide();
                var customerId = $('#editid').val();
                var fname = $('#editfname').val();
                var lname = $('#editlname').val();
                // alert(customerId);
                $.ajax({
                    url : 'ajax-update-form.php',
                    type : 'POST',
                    data : {id : customerId, first_name : fname, last_name : lname},
                    success : function (data) {
                        
                        if(data == 1){
                        //alert('check Ok');
                        $('#edit').hide();
                        loadTable();
                        }   
                    }
                });
        
            });

            //live serach
            $('#search').on("keyup", function() {
                // alert('ok');
                var search_term = $(this).val();

                $.ajax({
                    url : 'ajax-live-search.php',
                    type : 'POST',
                    data : {search : search_term},
                    success : function (data){
                        $('#table-data').html(data);
                    }
                })
            });
        });
    </script>

</body>
</html>