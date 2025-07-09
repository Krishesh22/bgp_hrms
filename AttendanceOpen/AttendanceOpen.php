<<<<<<< HEAD
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Attendance Status </title>
</head>

<body>
   
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" >
            <div class="container-fluid dashboard-content">
            <div class="card">
                        <h5 class="card-header">Open Daily Attendance</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" id="FromDate" name="FromDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" id="ToDate" name ="ToDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                       >
                                </div>
                               

                                <div class="form-group col-md-3" style="padding:17px">

                                    <a class="btn btn-warning btn-sm" id="submitBtn"><i
                                            ></i>
                                        Submit</a>


                                </div>
                            </div>

                        </div>



                    </div>
            </div>


            <?php include '../footer.php'?>
        </div>



    </div>

    <?php include '../footerjs.php'?>
    <script>
             $(document).ready(function() {
            $('#submitBtn').click(function() {    

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'Attendance.php',
                data: {
                    action: 'save',
                    FromDate:  $('#FromDate').val(),
                    ToDate:  $('#ToDate').val()
       
                },
                dataType: 'json',
                success: function(response) {
                
                    if (response.status === 'success') {
                        alert("Updated Successfully");
                    } 

                    else {
                        alert('Please Check Payroll and  Attendance...');
                    }
                },
                error: function() {
                    alert('An error occurred while updating.');
                }
            });
        });
    });
    </script>

</body>

=======
<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Attendance Status </title>
</head>

<body>
   
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" >
            <div class="container-fluid dashboard-content">
            <div class="card">
                        <h5 class="card-header">Open Daily Attendance</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">From Date</label>
                                    <input type="text" class="form-control" id="FromDate" name="FromDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                        >
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">To Date</label>
                                    <input type="text" class="form-control" id="ToDate" name ="ToDate"
                                        onfocus="(this.type='date')" onblur="(this.type='date')"
                                       >
                                </div>
                               

                                <div class="form-group col-md-3" style="padding:17px">

                                    <a class="btn btn-warning btn-sm" id="submitBtn"><i
                                            ></i>
                                        Submit</a>


                                </div>
                            </div>

                        </div>



                    </div>
            </div>


            <?php include '../footer.php'?>
        </div>



    </div>

    <?php include '../footerjs.php'?>
    <script>
             $(document).ready(function() {
            $('#submitBtn').click(function() {    

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'Attendance.php',
                data: {
                    action: 'save',
                    FromDate:  $('#FromDate').val(),
                    ToDate:  $('#ToDate').val()
       
                },
                dataType: 'json',
                success: function(response) {
                
                    if (response.status === 'success') {
                        alert("Updated Successfully");
                    } 

                    else {
                        alert('Please Check Payroll and  Attendance...');
                    }
                },
                error: function() {
                    alert('An error occurred while updating.');
                }
            });
        });
    });
    </script>

</body>

>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>