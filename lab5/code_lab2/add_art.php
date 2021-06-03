<?php
    require_once('all_fns.php');
    session_start();
    
  if(check_admin_user())
{
  if(filled_out($_POST))
  {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $description = $_POST['description'];
    $yearofwork = $_POST['yearofwork'];
    $genre = $_POST['genre'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $price = $_POST['price'];
    
    $artworkID = get_next_artworkID();
    
  }
}
    if ($_FILES['userfile']['error'] > 0)
    {
      echo 'Problem: ';
      switch ($_FILES['userfile']['error'])
      {
        case 1:	echo 'File exceeded upload_max_filesize';
                    break;
        case 2:	echo 'File exceeded max_file_size';
                    break;
        case 3:	echo 'File only partially uploaded';
                    break;
        case 4:	echo 'No file uploaded';
                    break;
        case 6:   echo 'Cannot upload file: No temp directory specified.';
                    break;
        case 7:   echo 'Upload failed: Cannot write to disk.';
                    break;
      }
      exit;
    }

    if ($_FILES['userfile']['type'] != 'image/jpeg')
  {
    echo 'Problem: file is not image';
    exit;
  }

  $upfile = "../resources/img/".$artworkID.".jpg";

  if (is_uploaded_file($_FILES['userfile']['tmp_name'])) 
  {
     if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: ';
    echo $_FILES['userfile']['name'];
    exit;
  }


  if(check_admin_user())
  {
    if(insert_art($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID))
    {
      
      header("location:show.php?artworkID=".$artworkID);
    }
    else{
      header("location:add_art_form.php");
    }
  }

  


?>