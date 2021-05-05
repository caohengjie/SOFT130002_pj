<?php 
    require_once('all_fns.php');
    session_start();
    if(check_admin_user())
    {
        if(isset($_POST['artworkID']))
        {
            $artworkID = $_POST['artworkID'];
            if(delete_art($artworkID))
            {
                echo "删除成功";
                header("refresh:1;url=home.php");
            }
            else{
                echo "删除失败";
            }
        }
    }
    else {
        echo "<p>You are not authorised to view this page.</p>";
      }

?>