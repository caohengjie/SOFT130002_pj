<?php
    require_once('all_fns.php');
    session_start();
    if(check_valid_user())
    {
    $old_user = $_SESSION['valid_user'];
    
    unset($_SESSION['valid_user']);
    $result_dest = session_destroy();
    }
    if(check_admin_user())
    {
        $old_user = $_SESSION['admin'];
    
        unset($_SESSION['admin']);
        $result_dest = session_destroy();
    }

    if(!empty($old_user))
    {
        if($result_dest)
        {
            do_home_html("未登录");
        }
        else {
            
             echo 'Could not log you out.<br />';
           }
    }
    else {
        
        echo 'You were not logged in, and so have not been logged out.<br />';
    }


?>