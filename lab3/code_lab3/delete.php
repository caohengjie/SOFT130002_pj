<?php
    require_once('all_fns.php');
    session_start();

    $del_me = $_POST['del_me'];
    $valid_user = $_SESSION['valid_user'];

    if (!filled_out($_POST)) {
        echo '<p>You have not chosen any bookmarks to delete.<br/>
              Please try again.</p>';
        
        
      } 
      else 
      {
        if (count($del_me) > 0) 
        {
          foreach($del_me as $artworkID) 
          {
            delete_cart_art($artworkID,$valid_user);
          }
        } else {
          echo 'No bookmarks selected for deletion';
        }
      }

      header("refresh:0.1;url=cart.php");

?>