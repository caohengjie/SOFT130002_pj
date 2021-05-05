<?php
function get_email($username)
{
    $conn = db_connect();
    $query = "select email from users where name='".$username."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->email;
}

function get_tel($username)
{
    $conn = db_connect();
    $query = "select tel from users where name='".$username."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->tel;
}

function get_title($artworkID)
{
    $conn = db_connect();
    $query = "select title from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->title;


}

function get_artist($artworkID)
{
    $conn = db_connect();
    $query = "select artist from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->artist;

}

function get_description($artworkID)
{
    $conn = db_connect();
    $query = "select description from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->description;
}

function get_genre($artworkID)
{
    $conn = db_connect();
    $query = "select genre from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->genre;
}

function get_width($artworkID)
{
    $conn = db_connect();
    $query = "select width from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->width;
}

function get_height($artworkID)
{
    $conn = db_connect();
    $query = "select height from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->height;
}

function get_yearOfWork($artworkID)
{
    $conn = db_connect();
    $query = "select yearOfWork from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->yearOfWork;
}

function get_price($artworkID)
{
    $conn = db_connect();
    $query = "select price from artworks where artworkID='".$artworkID."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->price;
}

function get_next_artworkID()
{
    $conn = db_connect();
    $query = "select max(artworkID) as maxid from artworks";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $row = $result->fetch_object();
    return ($row->maxid)+1;

}

function get_arts()
{
    $conn = db_connect();
    $query = "select * from artworks where artworkID<200";
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_arts = @$result->num_rows;
    if ($num_arts == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}

function get_arts_search($search_info)
{
    $conn = db_connect();
    $query = "select * from artworks where artist='".$search_info."' or title='".$search_info."' or genre='".$search_info."'" ;
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_arts = @$result->num_rows;
    if ($num_arts == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}


function get_userID($username)
{   
    $conn = db_connect();
    $query = "select userID from users where name='".$username."'";
    $result = @$conn->query($query);
    if(!$result)
    {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $row = $result->fetch_object();
    return $row->userID;
}

function get_cart_arts($userID)
{
    $conn = db_connect();
    $query = "select * from cart where userID='".$userID."'";
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_arts = @$result->num_rows;
    if ($num_arts == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}

function add_to_cart($artworkID,$username)
{
    $conn = db_connect();
    $userID = get_userID($username);
    $query = "insert into cart values (".$userID.",".$artworkID.")";
    $result = $conn->query($query);
    if (!$result) {
        return false;
    }
    return true;
}

function delete_cart_art($artworkID,$username)
{
    $conn = db_connect();
    $userID = get_userID($username);
    
    $query = "delete from cart where userID='".$userID."' and artworkID='".$artworkID."'";

    $result = $conn->query($query);
    if (!$result) {
        return false;
    }
    return true;
}

function insert_art($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID)
{
    $conn = db_connect();
    $query = "select *
              from artworks
              where artworkID=".$artworkID;
    $result = $conn->query($query);
    if ((!$result) || ($result->num_rows!=0)) 
    {
        return false;
    }
    $query = "insert into artworks(artworkID,artist,imageFileName,title,description,yearOfWork,genre,width,height,price,view,ownerID,orderID)
    values(".$artworkID.",'".$artist."','".$artworkID.".jpg','".$title."','".$description."',".$yearofwork.",'".$genre."',".$width.",".$height.",".$price.",0,0,0)";
    $result = $conn->query($query);
    if (!$result) {
        echo "insert problem";
        return false;
    } else {
        return true;
    }
}

function update_art($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID)
{
    $conn = db_connect();
    $query = "update artworks
              set title= '".$title."',
              artist = '".$artist."',
              description = '".$description."',
              yearofwork = ".$yearofwork.",
              price = ".$price.",
              genre = '".$genre."',
              width = ".$width.",
              height = ".$height." 
              where artworkID = ".$artworkID;

    $result = @$conn->query($query);
    if (!$result) {
        return false;
    } else {
        return true;
    }
}


function delete_art($artworkID)
{
    $conn = db_connect();

    $query = "delete from artworks where artworkID =".$artworkID;
    $result = @$conn->query($query);
    if (!$result) {
        return false;
      } else {
        return true;
    }
}


function recommend_art($username)
{
    $conn = db_connect();
    $userID = get_userID($username);
    $query = "select artworkID
              from cart
              where userID in
              (select distinct(b2.userID)
              from cart b1,cart b2
              where b1.userID=".$userID." 
              and b1.userID != b2.userID 
              and b1.artworkID = b2.artworkID)
              and artworkID not in
              (select artworkID from cart 
              where userID=".$userID.")
              group by artworkID
              having count(artworkID)>0";//修改这里的0这个数字即控制要求这个图片被x个人收藏过才会推荐给你
    if (!($result = $conn->query($query))) {
        throw new Exception('meet some problems.');
    }
           
    if ($result->num_rows==0) {
        throw new Exception('Could not find any bookmarks to recommend.');
    }

    $result = db_result_to_array($result);

    return $result;
}



?>