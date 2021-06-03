<?php
    require_once('all_fns.php');
    session_start();

    if(isset($_SESSION['trace']))
    {
        $trace  = $_SESSION['trace'];
        $str = "详情";
        if(!in_array($str,$trace))
        {
            array_push($trace,$str);
            $_SESSION['trace'] = $trace;
        }
        else{
            $point = array_search($str,$trace);
            $trace = array_slice($trace,0,$point+1);
            $_SESSION['trace'] = $trace;
        }
        
    }

    $artworkID = @$_GET['artworkID'];
    $_SESSION['show'] = $artworkID;
    $add_artworkID = @$_GET['add_artworkID'];

    if(!check_valid_user() && $add_artworkID)
    {
        header("location:login.php");
    }
    if(!check_cart_art($add_artworkID,@$_SESSION['valid_user']))
    {
       
        add_to_cart($add_artworkID,@$_SESSION['valid_user']);
    }
    if(check_admin_user())
    {
        $username = $_SESSION['admin'];
    }
    else if(check_valid_user())
    {
        $username = $_SESSION['valid_user'];
    }
    add_view($artworkID);
    do_show_html($artworkID,@$username);
    ?>