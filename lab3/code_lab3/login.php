<?php
    require_once('output_fns.php');

    $fail = @$_GET['fail'];
    if($fail == 1)
    {
        display_alert_login_fail();
    }
    do_login_html();
?>