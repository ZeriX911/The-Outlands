<?php
session_start();
$uid=$_SESSION['id'];
$msg="";
include_once('connect.php');
function error($msg){
    header('Location: editprofile.php?error='.$msg);
}
if(isset($_POST['upload']))
{   
 $file_loc = $_FILES['file']['tmp_name'];
 if ($file_loc==="") {
    error("Nincs megadva kép ");
 }
 $imagelink = file_get_contents($file_loc);
 $encdata = base64_encode($imagelink);
 $list="SELECT * FROM images WHERE userid=".$uid;
 $results = $connect->query($list);
if($results){

  if($results->num_rows>0){
      $connect -> query("DELETE FROM images where userid=".$uid);
  }

  $sql= "INSERT into images (userid, image) VALUES ('$uid', '$encdata')";
  if($connect->query($sql)){
    echo "Success :D";
    $connect->close();
    header('Location: profile.php');
  }else{
      error("Nem sikerült pedig eskü próbáltam :(");
  }
}else{
    error("Nem sikerült pedig eskü próbáltam :(");;
}
}
?>