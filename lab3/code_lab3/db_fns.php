<?php
    function db_connect()
    {
        $result = new mysqli('localhost','root','Chj20020109','artstore');
        if(!$result)
        {
            throw new Exception('could not connect to database server');
        }
        else
        {
            return $result;
        }
    }

    function db_result_to_array($result) {
        $res_array = array();
     
        for ($count=0; $row = $result->fetch_assoc(); $count++) {
          $res_array[$count] = $row;
        }
     
        return $res_array;
     }  

    ?>