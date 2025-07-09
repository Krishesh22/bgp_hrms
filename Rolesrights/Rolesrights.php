<<<<<<< HEAD
<?php include '../config.php';
include '../menus.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Roles Rights</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <style>

            .menu-item-role .menu-title{
                font-size: 15px;
                padding:10px;
                margin-bottom:0px;
            }

            label.switch{
                margin-bottom: 10px;
            }
            .menu-title:hover,
            label:hover{cursor:pointer;}
            /* Hide default checkbox */
            .menu-item-role {
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f9f9f9;
                margin-bottom: 5px;
                padding: 2px;
                transition: background-color 0.3s ease;
                font-size: 12px;
            }

            /* Hover effect for menu items */
            .menu-item-role:hover {
                background-color: #e0e0e0;
                /* Darker background color on hover */
            }

            /* General styles for submenu container */
            .submenu-container-role {
                display: none;
                padding: 15px 15px 5px 15px;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
                max-height: 0;
                /* Hide content initially */
                border-top: 1px solid #ddd;
                /* Border between menu and submenu */
                background-color: #fafafa;
                /* Background color for submenus */
            }

            /* When the menu item is expanded, display the submenu */
            .menu-item-role.expanded .submenu-container-role {
                display: block;
                max-height: 500px;
                /* Adjust as needed */
            }

            /* Hide default checkbox */
            .switch input {
                display: none;
            }

            /* Create the slider */
            .slider {
                position: relative;
                display: inline-block;
                width: 28px;
                height: 14px;
                background-color: #ccc;
                border-radius: 20px;
                transition: .4s;
                vertical-align: middle;
                margin-right: 10px;
            }

            /* Create the switch knob */
            .slider:before {
                content: "";
                position: absolute;
                height: 12px;
                width: 12px;
                border-radius: 50%;
                background: white;
                transition: .4s;
                top: 1px;
                left: 1px;
            }

            /* Style the slider when the checkbox is checked */
            input:checked+.slider {
                background-color: #405D77;
            }

            /* Move the knob when the checkbox is checked */
            input:checked+.slider:before {
                transform: translateX(14px);
            }

            /* Add a label to align the slider and text */
            label.switch {
                display: flex;
                align-items: center;
            }

            /* Add a margin to the text */
            label.switch span {
                margin-left: 10px;
            }
        </style>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-md-5">
                        <h5 class="text-green">Manage Roles and Permissions</h5>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>                     
                </div>


                <form id="rolePermissionForm">

                <div class="">
                <div class="">
                <div class="">

                <div class="row no-gutters">
                <div class="col-md-3">
                <label class="col-form-label" for="role">Role:</label>
                <select id="role" name="role" class="form-control">
                <option value=""></option>
                <option value="1">Admin</option>
                <option value="2">General Manager</option>
                <option value="8">HR Manager</option>
                <option value="7">HR Recruiter</option>
                <option value="13">Asset Entry</option>
                </select>
                </div>
                <div class="col-md-2">
                <button type="button" id="submitBtn" class="btn btn-sm btn-info" style="margin:27px 0 0px 5px">Save Permissions</button>
                </div>
                </div>

                        <div class="mt-3">

                            <div id="menu-container" style="margin-left:0px">
                                <?php foreach ($Menus as $menu) : ?>
                                    <div class="menu-item-role" data-mencode="<?php echo htmlspecialchars($menu['menucode']); ?>">
                                        <h3 class="menu-title"><?php echo htmlspecialchars($menu['name']); ?></h3>
                                        <div class="submenu-container-role" id="submenu-<?php echo htmlspecialchars($menu['menucode']); ?>">
                                            <div class="row">
                                                <?php
                                                // Convert menu name to key for submenus
                                                $menuKey = str_replace(' ', '', $menu['menucode']); // Converts 'Job Application' to 'JobApplication'
                                                if (array_key_exists($menuKey, $submenus)) :
                                                    foreach ($submenus[$menuKey] as $submenu) : ?>
                                                        <div class="col-md-4">
                                                            <label class="switch">
                                                                <input type="checkbox" name="submenus[]" value="<?php echo htmlspecialchars($submenu['submenucode']); ?>">
                                                                <span class="slider"></span>
                                                                <?php echo htmlspecialchars($submenu['name']); ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach;
                                                else : ?>
                                                   <div class="col"><p class="text-danger">No submenus available for <?php echo htmlspecialchars($menu['name']); ?>.</p></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                
                    </form>
            
                </div>
                </div>
                </div>
        </div>
        <?php include '../footer.php' ?>
    </div>
    <?php include '../footerjs.php' ?>
    <script>
        $(document).ready(function() {
            // Toggle submenu on menu item click
            $('.menu-title').click(function() {
                // Toggle the 'expanded' class on the parent menu-item-role
                $(this).parent('.menu-item-role').toggleClass('expanded');
            });
        });

        /////////////////////////
        $(document).ready(function() {
            $('#submitBtn').click(function() {
        // Gather selected role
        var role = $('#role').val();

        // Initialize arrays for storing menu codes and selected submenus
        var menuData = [];
        var submenuData = [];

        // Loop through each menu item
            $('.menu-item-role').each(function() {
                var menuCode = $(this).data('mencode');

                // Check if any submenu is selected within this menu
                $(this).find('input[name="submenus[]"]:checked').each(function() {
                    submenuData.push({
                        menu_code: menuCode,
                        submenu_code: $(this).val()
                    });
                });

                // Add the menu code to the menuData array
                menuData.push(menuCode);
            });

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'Permission.php',
                data: {
                    action: 'save',
                    role: role,
                    menus: menuData,
                    submenus: submenuData
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert('An error occurred while saving permissions.');
                    }
                },
                error: function() {
                    alert('An error occurred while saving permissions.');
                }
            });
        });
    });
    //////////////
    $('#role').change(function() {
        var role = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'Permission.php',
            data: { action: 'fetch',role: role },
            dataType: 'json',
            success: function(response) {
                // Clear existing selections
                $('.menu-item-role').each(function() {
                    $(this).find('input[name="submenus[]"]').prop('checked', false);
                });

                // Iterate over the fetched permissions
                response.forEach(function(permission) {
                    var menuCode = permission.Menucode;
                    var submenuCode = permission.Submenucode;

                    // Check the corresponding submenu checkbox
                    $('.menu-item-role[data-mencode="' + menuCode + '"]')
                        .find('input[name="submenus[]"][value="' + submenuCode + '"]')
                        .prop('checked', true);
                });
            },
            error: function() {
                alert('An error occurred while fetching permissions.');
            }
        });
    });
=======
<?php include '../config.php';
include '../menus.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php include '../Headercssin.php' ?>
    <title>Roles Rights</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

    <div class="dashboard-main-wrapper">

        <?php include '../headerin.php' ?>
        <?php include '../Sidebarin.php' ?>
        <style>

            .menu-item-role .menu-title{
                font-size: 15px;
                padding:10px;
                margin-bottom:0px;
            }

            label.switch{
                margin-bottom: 10px;
            }
            .menu-title:hover,
            label:hover{cursor:pointer;}
            /* Hide default checkbox */
            .menu-item-role {
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f9f9f9;
                margin-bottom: 5px;
                padding: 2px;
                transition: background-color 0.3s ease;
                font-size: 12px;
            }

            /* Hover effect for menu items */
            .menu-item-role:hover {
                background-color: #e0e0e0;
                /* Darker background color on hover */
            }

            /* General styles for submenu container */
            .submenu-container-role {
                display: none;
                padding: 15px 15px 5px 15px;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
                max-height: 0;
                /* Hide content initially */
                border-top: 1px solid #ddd;
                /* Border between menu and submenu */
                background-color: #fafafa;
                /* Background color for submenus */
            }

            /* When the menu item is expanded, display the submenu */
            .menu-item-role.expanded .submenu-container-role {
                display: block;
                max-height: 500px;
                /* Adjust as needed */
            }

            /* Hide default checkbox */
            .switch input {
                display: none;
            }

            /* Create the slider */
            .slider {
                position: relative;
                display: inline-block;
                width: 28px;
                height: 14px;
                background-color: #ccc;
                border-radius: 20px;
                transition: .4s;
                vertical-align: middle;
                margin-right: 10px;
            }

            /* Create the switch knob */
            .slider:before {
                content: "";
                position: absolute;
                height: 12px;
                width: 12px;
                border-radius: 50%;
                background: white;
                transition: .4s;
                top: 1px;
                left: 1px;
            }

            /* Style the slider when the checkbox is checked */
            input:checked+.slider {
                background-color: #405D77;
            }

            /* Move the knob when the checkbox is checked */
            input:checked+.slider:before {
                transform: translateX(14px);
            }

            /* Add a label to align the slider and text */
            label.switch {
                display: flex;
                align-items: center;
            }

            /* Add a margin to the text */
            label.switch span {
                margin-left: 10px;
            }
        </style>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">

                <div class="row">
                    <div class="col-md-5">
                        <h5 class="text-green">Manage Roles and Permissions</h5>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>                     
                </div>


                <form id="rolePermissionForm">

                <div class="">
                <div class="">
                <div class="">

                <div class="row no-gutters">
                <div class="col-md-3">
                <label class="col-form-label" for="role">Role:</label>
                <select id="role" name="role" class="form-control">
                <option value=""></option>
                <option value="1">Admin</option>
                <option value="2">General Manager</option>
                <option value="8">HR Manager</option>
                <option value="7">HR Recruiter</option>
                <option value="13">Asset Entry</option>
                </select>
                </div>
                <div class="col-md-2">
                <button type="button" id="submitBtn" class="btn btn-sm btn-info" style="margin:27px 0 0px 5px">Save Permissions</button>
                </div>
                </div>

                        <div class="mt-3">

                            <div id="menu-container" style="margin-left:0px">
                                <?php foreach ($Menus as $menu) : ?>
                                    <div class="menu-item-role" data-mencode="<?php echo htmlspecialchars($menu['menucode']); ?>">
                                        <h3 class="menu-title"><?php echo htmlspecialchars($menu['name']); ?></h3>
                                        <div class="submenu-container-role" id="submenu-<?php echo htmlspecialchars($menu['menucode']); ?>">
                                            <div class="row">
                                                <?php
                                                // Convert menu name to key for submenus
                                                $menuKey = str_replace(' ', '', $menu['menucode']); // Converts 'Job Application' to 'JobApplication'
                                                if (array_key_exists($menuKey, $submenus)) :
                                                    foreach ($submenus[$menuKey] as $submenu) : ?>
                                                        <div class="col-md-4">
                                                            <label class="switch">
                                                                <input type="checkbox" name="submenus[]" value="<?php echo htmlspecialchars($submenu['submenucode']); ?>">
                                                                <span class="slider"></span>
                                                                <?php echo htmlspecialchars($submenu['name']); ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach;
                                                else : ?>
                                                   <div class="col"><p class="text-danger">No submenus available for <?php echo htmlspecialchars($menu['name']); ?>.</p></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                
                    </form>
            
                </div>
                </div>
                </div>
        </div>
        <?php include '../footer.php' ?>
    </div>
    <?php include '../footerjs.php' ?>
    <script>
        $(document).ready(function() {
            // Toggle submenu on menu item click
            $('.menu-title').click(function() {
                // Toggle the 'expanded' class on the parent menu-item-role
                $(this).parent('.menu-item-role').toggleClass('expanded');
            });
        });

        /////////////////////////
        $(document).ready(function() {
            $('#submitBtn').click(function() {
        // Gather selected role
        var role = $('#role').val();

        // Initialize arrays for storing menu codes and selected submenus
        var menuData = [];
        var submenuData = [];

        // Loop through each menu item
            $('.menu-item-role').each(function() {
                var menuCode = $(this).data('mencode');

                // Check if any submenu is selected within this menu
                $(this).find('input[name="submenus[]"]:checked').each(function() {
                    submenuData.push({
                        menu_code: menuCode,
                        submenu_code: $(this).val()
                    });
                });

                // Add the menu code to the menuData array
                menuData.push(menuCode);
            });

            // AJAX request
            $.ajax({
                type: 'POST',
                url: 'Permission.php',
                data: {
                    action: 'save',
                    role: role,
                    menus: menuData,
                    submenus: submenuData
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert('An error occurred while saving permissions.');
                    }
                },
                error: function() {
                    alert('An error occurred while saving permissions.');
                }
            });
        });
    });
    //////////////
    $('#role').change(function() {
        var role = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'Permission.php',
            data: { action: 'fetch',role: role },
            dataType: 'json',
            success: function(response) {
                // Clear existing selections
                $('.menu-item-role').each(function() {
                    $(this).find('input[name="submenus[]"]').prop('checked', false);
                });

                // Iterate over the fetched permissions
                response.forEach(function(permission) {
                    var menuCode = permission.Menucode;
                    var submenuCode = permission.Submenucode;

                    // Check the corresponding submenu checkbox
                    $('.menu-item-role[data-mencode="' + menuCode + '"]')
                        .find('input[name="submenus[]"][value="' + submenuCode + '"]')
                        .prop('checked', true);
                });
            },
            error: function() {
                alert('An error occurred while fetching permissions.');
            }
        });
    });
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
    </script>