<?php
    require_once('all_fns.php');
    session_start();

    $artworkID = $_GET['artworkID'];

    if(check_admin_user())
    {
        $title = get_title($artworkID);
        $artist = get_artist($artworkID);
        $description = get_description($artworkID);
        $yearofwork = get_yearOfWork($artworkID);
        $genre = get_genre($artworkID);
        $width = get_width($artworkID);
        $height = get_height($artworkID);
        $price = get_price($artworkID);
        display_edit_form($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID);
    }
    else {
        echo "<p>You are not authorized to enter the administration area.</p>";
      }

?>