<?php
include 'config.php';
session_start();
include 'Commonmenu.php';


$Authorizedno = $_SESSION["Authorizedno"];
$Clientid=$_SESSION["Clientid"];
$cpage = strtolower(basename($_SERVER['SCRIPT_NAME'], '.php'));
$stmt = $conn->prepare("SELECT * FROM indsys1005rolesrights WHERE Clientid = ? AND Roleid = ?");
$stmt->bind_param("ii", $Clientid, $Authorizedno);
$stmt->execute();
$result = $stmt->get_result();
$permissions = [];

while ($row = $result->fetch_assoc()) {
    $permissions[$row['Menucode']][] = $row['Submenucode'];
}



?>

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

            <ul class='navbar-nav flex-column sidebar-menu'>
    <?php foreach ($menu as $menuKey => $menuItem): ?>
        <?php if (isset($permissions[$menuItem['Menucode']])): ?>
            <li class='nav-item'>
                <?php 
                    // Determine the correct URL to use
                    $menuUrl = ($menuItem['url'] === '#') ? ($menuItem['default_url'] ?? '#') : $menuItem['url'];
                ?>
                
                <?php if (empty($menuItem['submenus'])): ?>
                    <!-- Simple anchor tag for items without submenus -->
                    <a class='nav-link <?= ($cpage == $menuItem['pageactiveurl']) ? 'active' : '' ?>' href='<?= $menuUrl ?>'>
                        <i class='<?= $menuItem['icon'] ?>'></i><?= $menuItem['label'] ?>
                    </a>
                <?php else: ?>
                    <!-- Menu items with submenus -->
                    <a class='nav-link <?= in_array($cpage, array_column($menuItem['submenus'], 'pageactiveurl')) ? 'active' : '' ?>' 
                       href='<?= $menuItem['url'] ?>'
                       data-toggle='collapse'
                       aria-expanded='false'
                       data-target='#submenu-<?= $menuKey ?>'
                       aria-controls='submenu-<?= $menuKey ?>'>
                        <i class='<?= $menuItem['icon'] ?>'></i><?= $menuItem['label'] ?>
                    </a>
                    <div id='submenu-<?= $menuKey ?>' class='collapse submenu <?= in_array($cpage, array_column($menuItem['submenus'], 'pageactiveurl')) ? 'show' : '' ?>'>
                        <ul class='nav flex-column'>
                            <?php foreach ($menuItem['submenus'] as $subMenuKey => $subMenuItem): ?>
                                <?php if (in_array($subMenuItem['submenucode'], $permissions[$menuItem['Menucode']])): ?>
                                    <li class='nav-item'>
                                        <a class='nav-link <?= ($cpage == $subMenuItem['pageactiveurl']) ? 'active' : '' ?>' href='<?= $subMenuItem['url'] ?>'>
                                        <i class='<?= $subMenuItem['icon'] ?>'></i> <?= $subMenuItem['label'] ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>



    </div>
   
</div>
</nav>
</div>
</div>

