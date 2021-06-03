<?php
    require_once('all_fns.php');
    session_start();

    if(!isset($_SESSION['trace']))
    {
        $trace = array("首页");
        $_SESSION['trace'] = $trace;
    }else
    {
        $trace = array("首页");
        $_SESSION['trace'] = $trace;
    }
    
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    
    if($username && $password)
    {
        if(admin_login($username,$password))
        {
            $_SESSION['admin'] = $username;
            display_alert_admin_success("管理员登录成功");

        }
        else if(login($username,$password))
        {
            $_SESSION['valid_user'] = $username;
            display_alert_login_success("用户登录成功");
            
        }
        else{
            
            header("location:login.php?fail=1");
            
        }
    }
    if(check_admin_user())
    {
        $username = $_SESSION['admin'];
    }
    else if(check_valid_user())
    {
        $username = $_SESSION['valid_user'];
    }
    
    $art_array_view = get_arts_byview();
    $art_array_time = get_arts_bytime();
    
    do_home_html($username,$art_array_view,$art_array_time);
    
    
    
?>