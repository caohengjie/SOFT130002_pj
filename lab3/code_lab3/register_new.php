<?php
    require_once('all_fns.php');

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];

    session_start();

    try
    {
        

        if($password != $password2)
        {
            header("location:register_form.php?id=1");
            //throw new Exception('The passwords you entered do not match - please go back and try again.');
        }

        if ((strlen($password) < 6) || (strlen($password) > 16)) {
            header("location:register_form.php?id=2");
            //throw new Exception('Your password must be between 6 and 16 characters Please go back and try again.');
          }

        if(!(ctype_alnum($password)&&!ctype_alpha($password)&&!ctype_digit($password)))
        {
            
            header("location:register_form.php?id=3");
        }

        register($username,$email,$password,$telephone,$address);
        $_SESSION['valid_user'] = $username;
        echo 'Your registration was successful.  Go to the members page to start setting up your bookmarks!';
        
    }
    catch (Exception $e) {
        
        echo $e->getMessage();
        
        exit;
     }
?>