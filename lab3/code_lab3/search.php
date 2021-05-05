<?php
    require_once('all_fns.php');
    session_start();


    if(isset($_SESSION['trace']))
    {
        $trace  = $_SESSION['trace'];
        $str = "搜索";
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
    $search_info = @$_GET['search_info'];
    $_SESSION['search'] = @$search_info;
    if(isset($search_info))
    {
        $art_array = get_arts_search($search_info);
    }
    else 
    {
        $art_array = get_arts();
    }
    
    if(check_admin_user())
    {
        $username = $_SESSION['admin'];
    }
    else if(check_valid_user())
    {
        $username = $_SESSION['valid_user'];
    }
    do_search_html($art_array,@$username);

?>
