<?php
    require_once('all_fns.php');
    session_start();

    if(check_admin_user())
    {
        display_art_form();
    }
    else {
        echo "<p>You are not authorized to enter the administration area.</p>";
      }


?>
