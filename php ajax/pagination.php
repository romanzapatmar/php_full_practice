<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <!-- load more -->
    <div class="main">
        <div class="header">
            <h4>Load more</h4>
        </div>

        <div id="table-data">
            <table class="table table-bordered" id="loadData">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
              
            </table>
        </div>
    </div>
    

 <script src="js/jquery.js"></script>
    <!-- <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            function loadTable(page) {
                $.ajax({
                    url : 'ajax-pagination.php',
                    type : 'POST',
                    data : {page_no : page},
                    success : function (data) {
                        //alert('hi');
                        if(data){
                        $('#pagination').remove();
                        $('#loadData').append(data);
                        }else{
                            $('#ajaxBtn').html('Finished');
                            $('#ajaxBtn').prop('disabled', true);
                        }
                    }
                });                
            }
            loadTable();

            //code for load more button
            $(document).on("click", "#ajaxBtn", function() {
                // alert("ok");
                //$('#ajaxBtn').html('Loading');
                var pid = $(this).data("id");
                //alert(pid);
                loadTable(pid);
            });
            
        });
    </script> 
</body>
</html>