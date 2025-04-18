<?php include '../config.php';
session_start();
$Clientid = $_SESSION["Clientid"]; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Bulk SMS</title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>


        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">


                <div class="row">

                    <div class="col-md-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">BULK SMS</h2>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#AddRecipient">
                                            Add Recipient
                                        </button>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group d-none">
                                            <label for="sms_content">Recipient Number</label>
                                            <textarea class="form-control" id="recipient_number" title="Read Only" readonly rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="sms_content">Recipient Name</label>
                                            <textarea class="form-control" id="recipient_name" title="Read Only" readonly rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sms_content">Message Content</label>
                                            <textarea class="form-control" id="sms_content" maxlength="160" rows="3"></textarea>
                                            <small id="" class="form-text text-muted">
                                                Remaining characters <span id="remaining">160</span> / 160
                                            </small>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-success float-right btn-send-sms">
                                            Send Bulk SMS
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->



                <script>
                    const textarea = document.getElementById('sms_content');
                    const remainingCount = document.getElementById('remaining');
                    textarea.addEventListener('input', function() {
                        const maxLength = 160;
                        const currentLength = textarea.value.length;
                        const remaining = maxLength - currentLength;
                        remainingCount.textContent = remaining >= 0 ? remaining : 0;
                    });
                </script>


            </div>


            <?php include '../footer.php' ?>
        </div>



    </div>

    <?php include '../footerjs.php' ?>




   




    <!-- Modal -->
    <div class="modal fade" id="AddRecipient" tabindex="-1" role="dialog" aria-labelledby="AddRecipientLabel" aria-hidden="true" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddRecipientLabel">Employee List</h5>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="sms-table">

                        <div class="all-text text-right">
                            <p id="number-check" class="check-all">Check All</p>
                            <p id="number-clear" class="clear-all">Clear All</p>
                        </div>

                        <input type="text" id="tableSearch" placeholder="Search for mobile or name or IDs..." class="form-control mb-2" />
                        <table class="table table-sm table-bordered emp-table">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Select</th>
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Contact No</th>
                            </tr>
                            <?php
                            $cnt = 1;
                            $EmpQry = "SELECT * FROM indsys1017employeemaster WHERE Clientid=$Clientid AND EmpActive='Active' ORDER BY Fullname ASC";
                            $resultEmpQry = $conn->query($EmpQry);
                            while ($row = $resultEmpQry->fetch_assoc()) {
                                $Employeeid = $row['Employeeid'];
                                $Fullname = $row['Fullname'];
                                $Contactno = $row['Contactno'];
                                echo "<tr><td class='text-center'>$cnt</td>
                            <td class='text-center'><input type='checkbox' class='emp_number' data-emp-name='$Fullname' value='$Contactno'>
                            </td>
                            <td  class='text-center'>$Employeeid</td>
                            <td>$Fullname</td>
                            <td class='text-center' style='width:90px'>$Contactno</td>
                            </tr>";
                                $cnt++;
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <style>
        .sms-table {
            max-height: 375px;
            overflow-y: auto;
            padding-right: 5px;
        }

        .sms-table table th,
        .sms-table table td {
            font-size: 0.7rem !important;
        }

        .all-text {
            font-size: 0.7rem;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .all-text p {
            cursor: pointer;
            display: inline-block;
            padding: 5px 10px;
            margin-bottom: 0px !important;
        }

        .all-text .clear-all {
            background-color: red;
        }

        .all-text .check-all {
            background-color: green;
        }
    </style>




    <script>
        $(document).ready(function() {

            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            function updateRecipients() {
                var recipientNumbers = [];
                var recipientNames = [];

                $('.emp_number:checked').each(function() {
                    recipientNumbers.push($(this).val());
                    recipientNames.push($(this).data('emp-name'));
                });

                $('#recipient_number').val(recipientNumbers.join(','));
                $('#recipient_name').val(recipientNames.join(', '));
            }

            $(document).on('change', '.emp_number', function() {
                updateRecipients();
            });

            $('#number-clear').on('click', function() {
                $('#recipient_number').val('');
                $('#recipient_name').val('');
                $('.emp_number').prop('checked', false);
            });

            $('.check-all').on('click', function() {
                $('.emp_number').prop('checked', true);
                updateRecipients();
            });          

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-send-sms').on('click', function() {
                var recipientNumber = $('#recipient_number').val().trim();
                var smsContent = $('#sms_content').val().trim();

                if (recipientNumber === '') {
                    alert('Please enter a recipient number.');
                    return;
                }

                if (smsContent === '') {
                    alert('Please enter the message content.');
                    return;
                }

                $.post('bulk_sms_send.php', {
                    recipient_number: recipientNumber,
                    sms_content: smsContent
                }, function(response) {
                    if (response === "1") {
                        alert('SMS sent successfully.');
                        $('#recipient_number').val('');
                        $('#recipient_name').val('');
                        $('#sms_content').val('');
                        
                    } else {
                        alert(response);
                    }
                });
            });

            $('#sms_content').on('input', function() {
                var remaining = 160 - $(this).val().length;
                $('#remaining').text(remaining);
            });
        });
    </script>



</body>

</html>