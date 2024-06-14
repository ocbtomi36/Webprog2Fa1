<?php 

require CORE_DIR.'views.php';


$menuElements = 
[
    [
        'href' => 'start.php?U=users&M=add',
        'menuTitle' => 'Create a User'
    ],
    [
        'href' => 'start.php?U=users&M=listing',
        'menuTitle' => 'List all User'
    ],
    ];

$menuCnt = count($menuElements);

?>
<nav>
        <?php 
            print_menu($menuElements);
        ?>

</nav>