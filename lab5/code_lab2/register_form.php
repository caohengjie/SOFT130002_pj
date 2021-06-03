<?php
    require_once('all_fns.php');
    $id = @$_GET['id'];
    if($id == 1)
    {
        display_reg_id1();
    }
    else if($id == 2)
    {
        display_reg_id2();
    }
    else if($id == 3)
    {
        display_reg_id3();
    }

    
    do_register_html();

    ?>