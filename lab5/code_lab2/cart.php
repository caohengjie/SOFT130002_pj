<?php
    require_once('all_fns.php');
    session_start();
    if(!check_valid_user())
    {
        echo "qingdenglu";
        header("location:login.php");
    }
    else
    {
       $userID = get_userID($_SESSION['valid_user']);
       $art_array = get_cart_arts($userID);

       do_cart_html($art_array,$_SESSION['valid_user']);
    }



?>