<?php
    require_once('all_fns.php');
    session_start();

    $artworkID = $_GET['artworkID'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $description = $_POST['description'];
    $yearofwork = $_POST['yearofwork'];
    $genre = $_POST['genre'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $price = $_POST['price'];

    if(update_art($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID))
    {
        header("location:show.php?artworkID=".$artworkID);
    }
    else{
        echo 2;
    }

?>