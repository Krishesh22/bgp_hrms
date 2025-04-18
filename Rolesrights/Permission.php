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
        if ($_POST['action'] === 'save') {
            $role = $_POST['role'];
            $submenus = $_POST['submenus'];

            // Create connection
          

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement
            $stmtSubmenu = $conn->prepare("INSERT INTO indsys1005rolesrights (Clientid, Roleid, Menucode, Userid, Addormodifydatetime, Submenucode) VALUES (?, ?, ?, ?, ?, ?)");

            // Clear existing permissions for this role
            $deleteStmt = $conn->prepare("DELETE FROM indsys1005rolesrights WHERE Clientid=? AND Roleid = ?");
            $deleteStmt->bind_param("ii",$Clientid, $role);
            $deleteStmt->execute();
            $deleteStmt->close();

            // Insert new permissions
            foreach ($submenus as $submenu) {
                $menuCode = $submenu['menu_code'];
                $submenuCode = $submenu['submenu_code'];
                $stmtSubmenu->bind_param("iissss", $Clientid, $role, $menuCode, $user_id, $date, $submenuCode);
                $stmtSubmenu->execute();
            }

            $stmtSubmenu->close();
     

            // Return a response
            echo json_encode(['status' => 'success', 'message' => 'Permissions saved successfully.']);
        } elseif ($_POST['action'] === 'fetch') {
            $role = $_POST['role'];

            // Create connection
       

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement
            $stmt = $conn->prepare("SELECT Menucode, Submenucode FROM indsys1005rolesrights WHERE Clientid=? AND Roleid = ?");
            $stmt->bind_param("ii", $Clientid,$role);
            $stmt->execute();
            $result = $stmt->get_result();

            $permissions = [];
            while ($row = $result->fetch_assoc()) {
                $permissions[] = $row;
            }

            $stmt->close();
           

            // Return the permissions data as JSON
            echo json_encode($permissions);
        }
    }
    exit;
}
?>