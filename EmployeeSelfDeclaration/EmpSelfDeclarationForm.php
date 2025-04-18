<?php include '../config.php'?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php'?>
    <title>Department Creation </title>
</head>

<body>

    <style type="text/css">
.btn-nda-down{
position: absolute;
top: 5px;
right:15px;
}
</style>
   
    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php'?>
        <?php include '../Sidebarin.php'?>
        <div class="dashboard-wrapper" >
            <div class="container-fluid dashboard-content">
               

               <div class="row">
                <div class="col-md-12">

<div class="card">
<h5 class="card-header text-green">Employee Self Declaration Form</h5>
<div class="card-body">
<a href="employee-self-declaration-form.pdf" target="_blank" class="btn btn-info btn-nda-down"><i class="fa fa-download"></i> Download</a>

<iframe style="width:100%; height:800px" src="employee-self-declaration-form.pdf" frameborder="0" allowfullscreen title="">
</iframe>

</div>
</div>


            </div>


            <?php include '../footer.php'?>
        </div>



    </div>

    <?php include '../footerjs.php'?>

</body>

</html>