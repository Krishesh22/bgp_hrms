<?php 
include '../config.php';
include '../session.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$_SESSION["Tittle"] = "Employee";
$Message = '';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if($_POST['action']==='ListEmp')
        {           
            $Sql="SELECT * FROM indsys1017employeemaster Where Clientid='$Clientid' AND EmpActive='Active' ORDER BY Fullname ASC";           
            $resultemp =$conn->query($Sql);
            $employee=array();
            if($resultemp->num_rows>0)
            {
                while($row =$resultemp->fetch_assoc())
                {
                    $employee[]=$row;
                }
            }          
            echo json_encode($employee);

        }
        if($_POST['action']==='FetchEmp')
        {
            $Employeeid=$_POST['Employeeid'];
            $Sql="SELECT * FROM indsys1017employeemaster Where Clientid='$Clientid' AND EmpActive='Active' AND Employeeid='$Employeeid' ";
            $resultemp = $conn->query($Sql);
            $Department = "";
            $Designation ="";
            $Type_Of_Posistion = "";
            $Fullname="";
            $OfficemailID="";

            if($resultemp ->num_rows>0)
            {
                while($row=$resultemp->fetch_assoc())
                {
                $Type_Of_Posistion=$row['Type_Of_Posistion'];
                $Department=$row['Department'];
                $Designation =$row['Designation'];
                $Fullname=$row['Fullname'];
                $Title=$row['Title'];
                $OfficemailID=$row['OfficemailID'];
                }

            }
            echo json_encode(['Type_Of_Posistion'=>$Type_Of_Posistion,'Department' =>$Department,'Designation'=>$Designation,'Fullname'=>$Fullname,'Title' =>$Title,'OfficemailID' =>$OfficemailID]);
        }
        if($_POST['action']==='FetchUser')
        {           
            $Sql="SELECT * FROM indsys1000useradmin Where Clientid='$Clientid'  ORDER BY Username ASC";           
            $resultemp =$conn->query($Sql);
            $employee=array();
            if($resultemp->num_rows>0)
            {
                while($row =$resultemp->fetch_assoc())
                {
                    $employee[]=$row;
                }
            }          
            echo json_encode($employee);

        }
        if($_POST['action']==='Save')
        {           
            $Department = $_POST['Department'];
            $Designation=$_POST['Designation'];
            $Role=$_POST['Role'];
            $Type_Of_Posistion=$_POST['Type_Of_Posistion'];  
            $UserType=$_POST['UserType'];
            $Employeeid=$_POST['Userid'];
            $Emaild=$_POST['Emaild'];
            $Contactno=$_POST['Contactno'];
            $Message="";
            $Fullname=$_POST['Fullname'];

            $Sql="SELECT * FROM indsys1000useradmin Where Clientid='$Clientid' AND Userid='$Employeeid'  ORDER BY Username ASC";           
            $resultemp =$conn->query($Sql);
            $employee=array();
            if($resultemp->num_rows>0)
            {
                while($row =$resultemp->fetch_assoc())
                {
                    $employee[]=$row;
                }
            }     
            else
            {
                $Save="INSERT INTO indsys1000useradmin(Clientid,Employeeid,Username,Emailid,Contactno,Authorizedno,Title,Usertoken) VALUES('$Clientid','$Employeeid','$Fullname','$Emaild','$Contactno','$Role','$Title','None')";
                $resultsave = mysqli_query($conn, $Save);
                if($resultsave===TRUE)
                {
                    $Message="Success";
                }
                else{
                    $Message="Error";
                }
            }     
            echo json_encode(['status'=>$Message]);

        }
    }
}
?>