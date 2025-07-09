<?php
include 'config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$Category='Category 3';
$logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive ='Active' and Type_Of_Posistion='$Category'  ORDER BY Employeeid ASC";
        $logempall = mysqli_query($conn, $logemp);
        while ($row = mysqli_fetch_array($logempall)) {            
            $Employeeid = $row['Employeeid'];
            $Basic = $row['Basic'];
            $HR_Allowance = $row['HR_Allowance'];
            $Other_Allowance = $row['Other_Allowance'];
            $TA = $row['TA'];
            $Performanceallowance = $row['Performance_allowance'];
            $Day_allowance = $row['Day_allowance'];
            $PF_Yesandno=$row['PF_Yesandno'];
            $ESI_Yesandno=$row['ESI_Yesandno'];
            $Fullname=$row['Fullname'];
            $Gross_Salary=$row['Gross_Salary'];
        $GetPFESI = "SELECT * FROM indsys1025pfandesilimitmaster where Clientid ='$Clientid' ";
        $result_PFESI = $conn->query($GetPFESI);
        if (mysqli_num_rows($result_PFESI) > 0) {
            while ($rowPFESI = mysqli_fetch_array($result_PFESI)) {
                $PFLimit = $rowPFESI['PFLimit'];
                $ESILimit = $rowPFESI['ESILimit'];
                $PFemployeepercentage = $rowPFESI['PFemployeepercentage'];
                $PFemployeerpercentage = $rowPFESI['PFemployeerpercentage'];
                $ESIemployeepercentage = $rowPFESI['ESIemployeepercentage'];
                $ESIemployeerpercentange = $rowPFESI['ESIemployeerpercentange'];
                $Bonuspercentage = $rowPFESI['Bonuspercentage'];
            }
        }
        $Total = $Basic + $HR_Allowance + $TA + $Performance_allowance + $Other_Allowance;
        if($PF_Yesandno=='Yes')
        {
            $Employeer_contribution_yes_no='Yes';
        }
        else{
              $Employeer_contribution_yes_no='No';
              $PF_Employeer_contribution =0;
        }
        if ($Employeer_contribution_yes_no == 'Yes') {
            $pfemployeerpercentage =  ($PFemployeerpercentage / 100);         
            $PF_Employeer_contribution = ($Basic + $Other_Allowance) * $pfemployeerpercentage;
            $PF_Employeer_contribution = round($PF_Employeer_contribution, 0);
        }
        if ($ESI_Yesandno == 'Yes') {
 
            $esiemployeerpercentage =  ($ESIemployeerpercentange / 100);
            $ESI_Employeer_contribution =($Total * $esiemployeerpercentage);
        } else {
          
            $ESI_Employeer_contribution=0;
        }
           $Bonus = ($Bonuspercentage/100)*$Basic;
           $Bonus = round($Bonus, 0);
           $CTC=round($Bonus+$Gross_Salary+$PF_Employeer_contribution+$ESI_Employeer_contribution);

              $resultEmployeeUpdate = "Update indsys1017employeemaster set  
                Employeer_contribution_yes_no='$Employeer_contribution_yes_no',
                PF_Employeer_contribution='$PF_Employeer_contribution',
                ESI_Employeer_contribution='$ESI_Employeer_contribution',
                Bonus='$Bonus',
                CTC='$CTC',              
                Userid ='$user_id'    
                WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
        $resultExistsEmployeeUpdateResult = $conn->query($resultEmployeeUpdate);
        if ($resultExistsEmployeeUpdateResult === TRUE) {
            echo "Employee ID: $Employeeid - Salary details updated successfully.<br>";
        } else {
           echo "Error updating Employee ID: $Employeeid - " .$resultEmployeeUpdate . $conn->error . "<br>";
        }

        }
?>