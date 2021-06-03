<?php
    function filled_out($form_vars) {
        // test that each variable has a value
        foreach ($form_vars as $key => $value) {
           if ((!isset($key)) || ($value == '')) {
              return false;
           }
        }
        return true;
      }


      function check_cart_art($add_artworkID,$username)
      {
         $conn = db_connect();
         $userID = get_userID($username);
         $query = "select * from cart where userID='".$userID."' and artworkID='".$add_artworkID."'";
         $result = @$conn->query($query);
         if (!$result) {
            return false;
         }
         $num_arts = @$result->num_rows;
         if ($num_arts == 0) {
            return false;
         }
         return true;
      }
?>