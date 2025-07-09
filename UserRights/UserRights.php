<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>User Creation </title>
</head>

<body>
   
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" >
            <div class="container-fluid dashboard-content">
                 <h5 class="text-green">User Rights</h5>
                 <div class="col-lg-12">
                <div class="row">
                <div class="form-group col-md-3">
                        <label class="col-form-label">Type</label>
                        <select id="UserType" name="UserType" class="form-control">                       
                        <option value="1">Employee</option>
                        <option value="2">Other</option>                    
                        </select>
                    </div>
                   
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Role</label>
                        <select id="role" name="role" class="form-control">
                        <option value=""></option>
                        <option value="1">Admin</option>
                        <option value="2">General Manager</option>
                        <option value="8">HR Manager</option>
                        <option value="7">HR Recruiter</option>
                        <option value="13">Asset Entry</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">User ID</label>
                        <select class="form-control" id="Employeeid" name="Employeeid" autocomplete="off">
                        <option value=""></option>
                        </select>
                    
                    </div>
                  
                    <div class="form-group col-md-3">
                        <label class="col-form-label">User Name</label>
                        <div class="input-group "><span class="input-group-prepend">
                            <select class="input-group-text surname-width" id="Title" name="Title" readonly>
                                <option Value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>

                            </select >
                        </span>
                        <input type="text" placeholder="Firstname" class="form-control"
                        id="Fullname" name="Fullname" readonly>
                        </div>
                      
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Department</label>
                        <input type="text" class="form-control" id="Department" name="Department"
                            autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Designation</label>
                        <input type="text" class="form-control" id="Designation" name="Designation"
                            autocomplete="off" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Category</label>
                        <input type="text" class="form-control" id="Type_Of_Posistion" name="Type_Of_Posistion"
                            autocomplete="off" readonly>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Contact No</label>
                        <input type="text" class="form-control" id="Contactno" name="Contactno"
                            autocomplete="off" >
                    </div>      
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Email-ID</label>
                        <input type="text" class="form-control" id="Emaild" name="Emaild"
                            autocomplete="off" >
                    </div>       

                </div>
                <div class="btn-row text-right">
                    <button class="btn btn-rounded btn-success" id="btnsave" name="btnsave">Save / Update</button>
                </div>
                <br/>
               
                <div class="row ">
                    <div class="col-lg-12">
                    <div class="table-responsive ">
                    <table class="table table-bordered  table-sm table-striped">
                        <thead>
                            <tr class="text-green">
                                <th>S.No</th>
                                <th>Username</th>
                                <th>Contact no</th>
                                <th>Email ID</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            
                        </tbody>
                    </table>
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
            $.ajax({
                url: 'User.php',
                type: 'POST',
                data :{
                    action:'ListEmp'

                },
                dataType: 'json',
                success: function(data) {
                    var dropdown = $('#Employeeid');
                    $.each(data, function(key, employee) {
                        dropdown.append($('<option></option>').attr('value', employee.Employeeid).text(employee.Fullname));
                    });
                    LoadUser();
                },
                error: function() {
                    alert('Error loading employee data');
                }
            });
        });
        $('#Employeeid').change(function()
        {
            var Employeeid=$(this).val();
            $.ajax({
                url:'User.php',
                type:'POST',
                data:{
                    action:'FetchEmp',
                    Employeeid:Employeeid
                    },
                dataType:'json',
                success:function(response)
                {
                    $('#Fullname').val(response.Fullname);
                    $('#Department').val(response.Department);
                    $('#Designation').val(response.Designation);
                    $('#Type_Of_Posistion').val(response.Type_Of_Posistion);
                    $('#Title').val(response.Title);
                    $('#Emaild').val(response.OfficemailID)
                },
                error:function()
                {
                    alert('Error in Fetching User/Employee Data');
                }
            });
        });
        $(document).ready(function()
        {
            $('#btnsave').click(function()
            {
                $.ajax({
                    url:'User.php',
                    type:'POST',
                    data:{
                        action:'Save',
                        Userid:$('#Employeeid').val(),
                        Fullname:$('#Fullname').val(),
                        Department:$('#Department').val(),
                        Designation:$('#Designation').val(),
                        Type_Of_Posistion:$('#Type_Of_Posistion').val(),
                        UserType:$('#UserType').val(),
                        Role:$('#role').val(),
                        Emaild:$('#Emaild').val(),
                        Contactno:$('#Contactno').val(),
                        
                    },
                    dataType:'json',
                    success:function(response)
                    {
                    if(response.status=="Success");
                    {
                        LoadUser();
                    }
                    },
                    error:function()
                    {
                        alert("Error in processing");
                    }

                })

            });

        });
        function LoadUser()
        {
        var roleMapping = {1: 'Admin',2: 'General Manager',8: 'HR Manager',7: 'HR Recruiter',13: 'Asset Entry'};
        $.ajax({
            url:'User.php',
            type:'POST',
            data:{
                action:'FetchUser'
            },
            dataType:'json',
            success:function(response)
            {
                var tableBody = $('#userTableBody');
                    $.each(response, function(index, user) {
                        var row = $('<tr></tr>');
                        row.append($('<td></td>').text(index + 1));
                        row.append($('<td></td>').text(user.Username));
                        row.append($('<td></td>').text(user.Contactno));
                        row.append($('<td></td>').text(user.Emailid));
                        row.append($('<td></td>').text(roleMapping[user.Authorizedno] || user.Authorizedno));
                        row.append($('<td></td>').html(' <div class="action-btn"> <img height="15" src="<?php echo "$domain"; ?>/assets/icons/edit.png"></img><img height="15" src="<?php echo "$domain"; ?>/assets/icons/delete.png"></img>'));
                        tableBody.append(row);
                    });

            },
            error:function()
            {
                alert('Error loading user data');
            }
        })
        }
    </script>

</body>

</html>