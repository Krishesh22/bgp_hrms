<?php

include 'session.php';
include 'Commonmenu.php';
$currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// include 'config.php';
// error_reporting(0);
// session_start();
// $ClientId = $_SESSION['Clientid'] ?? null;
// $Authorizedno = $_SESSION['Authorizedno'] ?? null;
// $submenuCode = $_GET['submenu_code'] ?? null;

// $stmt = $conn->prepare("SELECT * FROM indsys1005rolesrights WHERE Clientid = ? AND Roleid = ? AND Submenucode = ?");
// $stmt->bind_param("iis", $ClientId, $Authorizedno,$submenuCode);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     echo "Permission granted.";
// }



//     else {
//         echo json_encode(['status' => 'error', 'message' => 'You do not have rights to access this page.','redirect_url'=>$domain.'/dashboard.php']); 
      
 
       
//     } // Redirecting To Home Page

function findMenuItemByUrl($menu, $currentUrl) {
    foreach ($menu as $menuKey => $menuItem) {
        if (isset($menuItem['url']) && $menuItem['url'] === $currentUrl) {
            return ['menu' => $menuKey, 'submenu' => null];
        }
        if (isset($menuItem['submenus'])) {
            foreach ($menuItem['submenus'] as $subMenuKey => $subMenuItem) {
                if (isset($subMenuItem['url']) && $subMenuItem['url'] === $currentUrl) {
                    return ['menu' => $menuKey, 'submenu' => $subMenuKey];
                }
            }
        }
    }
    return null;
}

// Find the matching menu item
$matchedMenuItem = findMenuItemByUrl($menu, $currentUrl);
$Submenucode="";

if ($matchedMenuItem) {
    $menuKey = $matchedMenuItem['menu'];
    $submenuKey = $matchedMenuItem['submenu'];
    
    if ($submenuKey !== null) {
        $submenu = $menu[$menuKey]['submenus'][$submenuKey];
       // echo "Submenu: " . $submenu['label'] . " (Code: " . $submenu['submenucode'] . ")";
       $Submenucode=$submenu['submenucode'];
    } else {
        $menu = $menu[$menuKey];
        //echo "Menu: " . $menu['label'] . " (Code: " . $menu['Menucode'] . ")";
    }
} else {
   // echo "No matching menu item found for the current URL.";
}

checkformpermission($_SESSION["Clientid"], $_SESSION["Authorizedno"], $Submenucode, $conn, $domain);
function checkformpermission($ClientId,$Authorizedno,$Submenucode,$conn,$domain)
{
    $stmt = $conn->prepare("SELECT * FROM indsys1005rolesrights WHERE Clientid = ? AND Roleid = ? AND Submenucode = ?");
$stmt->bind_param("iis", $ClientId, $Authorizedno,$Submenucode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   
}

else {
        echo "<script>
        alert('Permission Denied!');
        window.location.href = '$domain/dashboard.php';
       </script>";      
}
}
?>