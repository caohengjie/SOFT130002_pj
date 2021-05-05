<?php
    require_once('db_fns.php');

    function register($username,$email,$password,$telephone,$address)
    {
        $conn = db_connect();

        $result = $conn->query("select * from users where name='".$username."'");

        if(!$result)
        {
            throw new Exception('Could not execute query');
        }

        if ($result->num_rows>0) 
        {
            throw new Exception('That username is taken - go back and choose another one.');
        }

        $result = $conn->query("insert into users(name,email,password,tel,address) values('".$username."','".$email."','".$password."','".$telephone."','".$address."')");
        
        if (!$result) {
            throw new Exception('Could not register you in database - please try again later.');
          }
        
        return true;
        
        
    }
    function login($username,$password)

    {
        $conn = db_connect();

        
        $result = $conn->query("select * from users where name='".$username."'and password = '".$password."'");

        if(!$result)
        {
            return false;
        }

        if($result->num_rows>0)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    function admin_login($username,$password)
    {
        $conn = db_connect();
        $result = $conn->query("select * from admin where username='".$username."'and password = '".$password."'");
        if(!$result) 
        {
            return false;
        }
        else if($result->num_rows==0)
        {
            return false;
        }
        else{
            return true;
        }

    }

    function check_valid_user()
    {
        if (isset($_SESSION['valid_user']))
        {
            return true;
        }
        else{
            return false;
        }
    }

    function check_admin_user() {
        
        
        if (isset($_SESSION['admin'])) {
            return true;
        } 
        else
        {
            return false;
        }
    }
?>