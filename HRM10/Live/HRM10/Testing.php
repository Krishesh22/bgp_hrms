<?php
include('../config.php');
include('../Useraccess.php');
error_reporting(0);

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $_SESSION["AdditionAddress"]='Home.php';
      $_SESSION["ModificationAddress"]='Home.php';
      $_SESSION["ViewAddress"]='Home.php';
      $_SESSION["ReturnAddress"]='../Settings.php';
      $_SESSION["Tittle"] ="Newsletter";
$Message ="";

$Usertype= $_SESSION["Authorizedtype"] ;
$Message ="";

$date = date('d-m-y h:i:s');

$Formid ="MA15";
$Message =Userrights($Formid, $Usertype, $con);

if($Message == "false")
{
   header("Location: ../logout.php");

}
else
{

}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News Letter</title>
    <?php include('../SubMenuLayout.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




</head>

<body>
    <div ng-App="MyApp" ng-controller="MA15Controller">
        <div class="containerNEW" style="overflow-x:auto;overflow-y:auto;height:82vh;">



            <div class="row">
                <div class="col-lg-3">

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="box-title"> News Letter Table<span class="lblmandotry">*</span></p>
                        </div>


                        <div class="col-lg-12 m-t-m-5">

                            <br>
                            <label>News Year</label>
                            <?php 
                                  $year_start  = 1940;
                                  $year_end = date('Y'); // current Year
                                   $user_selected_year = 1992; // user date of birth year

                                  echo '<select id="News_year" name="News_year"  ng-model="News_year">'."\n";
                                  for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                    $selected = ($user_selected_year == $i_year ? ' selected' : '');
                                    echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
                                  }
                                  echo '</select>'."\n";
                                 ?>

                        </div>

                        <div class="col-lg-12 m-t-m-5">
                            <!-- <div class="dropdown-input"  ng-model="News_month" id="News_month" name="News_month"
                                        placeholder="Enter Month"> -->
                            <br>
                            <label>News Month</label>

                            <?php
                                               $selected_month = date('m'); //current month
                                                echo '<select id="News_month" name="News_month" ng-model="News_month">'."\n";
                                                 for ($i_month = 1; $i_month <= 12; $i_month++) { 
                                                 $selected = ($selected_month == $i_month ? ' selected' : '');
                                                 echo '<option value="'.$i_month.'"'.$selected.'>'. date('F', mktime(0,0,0,$i_month)).'</option>'."\n";
                                                }
                                                   echo '</select>'."\n";
                                             ?>
                        </div>


                        <div class="col-lg-12 m-t-m-5">
                            <br>
                            <label>News Path</label>
                            <div class="input-group">
                                <input type="file" class="form-control" ng-model="News_path" id="fileInput05"
                                    name=files[] accept="image/png, image/gif, image/jpeg,application/pdf">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-right mt-2">
                                <p ng-click="Reset();" class="back-btn"><i class="fa fa-times" aria-hidden="true"></i>
                                    &nbsp;Clear</p>&nbsp;
                                <p id="fileButton05" class="back-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    &nbsp;Save</p>
                            </div>
                        </div>

                    </div>
                </div>


             
                  
                  
                        <div class="col-md-8">

                            <div class="table-responsive">
                                <table class="table table-bordered  table-sm table-striped">
                                    <thead>
                                        <tr>

                                            <th>News Year</th>
                                            <th scope="col">News Month</th>
                                            <th scope="col">News File</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr dir-paginate="e in GetTittleList |filter:searchTittle|itemsPerPage:n "
                                            class="table-dir-paginatenew" pagination-id="DesignationGrid"
                                            current-page="currentPageTittle">

                                            <td>{{e.News_year}}</td>
                                            <td>{{e.News_month}}</td>
                                            <td>{{e.News_path}}</td>

                                            <td>
                                                <div class="action-btn">
                                                    <img height="15" data-toggle="modal"
                                                        data-target="#ModalCenter1EMPDocumentView"
                                                        ng-click="FetchStudy(e.News_year,e.News_month);"
                                                        src="<?php echo "$domain"; ?>/assets/icons/view.png">
                                                </div>
                                            </td>

                                            <td>
                                                <div class='select-btn-sm-1' data-toggle="modal"
                                                    data-target="#myModaDeleteTittle">Delete</div>
                                            </td>

                                        </tr>
                                    </tbody>

                            </div>


                            <div class="info-msg">{{Message}}</div>

                        </div>



              

            </div>

        </div>






        <div class='iif-modal'>
            <div class="modal fade" id="myModaDeleteTittle">
                <div class="modal-dialog" ng-class="">
                    <div class="modal-title">
                        <span>Delete</span>
                        <span class="modal-close-btn pull-right" data-dismiss="modal">&#x2715;</span>
                    </div>
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <span>Are you sure want to delete this record?</span>
                            </div>
                            <div class="col-lg-12 mt-3">

                                <p class="yes-no-btn" data-dismiss="modal" ng-click="DeleteDoc();"><i
                                        class="fa fa-check"></i>&nbsp;&nbsp;Yes</p>
                                <p class="yes-no-btn" data-dismiss="modal" ng-click="Getuncheck();"><i
                                        class="fa fa-times"></i>&nbsp;&nbsp;Cancel</p>

                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="ModalCenter1EMPDocumentView" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header alert alert-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        Document
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <iframe ng-src="{{EmpDocumentView}}"
                                            ng-hide="EmpDocumentView == null || EmpDocumentView == '' "
                                            ng-show="EmpDocumentView != null " style="height:400px;width:100%"></iframe>
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-rounded btn-dark"
                                            data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>

        </div>
    </div>


   





    <script src="../Scripts/Controller/MA15Controller.js"></script>
</body>

</html>