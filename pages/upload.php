<?php
session_start();
$uid=$_SESSION['id'];
$msg="";
include_once('connect.php');
function error($msg){
    header('Location: editprofile.php?error='.$msg);
    exit;
}
if(isset($_POST['upload']))
{   
 $file_loc = $_FILES['file']['tmp_name'];
 $allowed = array('png', 'jpg');
 $filename = $_FILES['file']['name'];
 $ext = pathinfo($filename, PATHINFO_EXTENSION);
 if (!in_array($ext, $allowed)) {
  error($ext." not allowed for file extension !");
  //error("Not allowed >:(");
  
}
 if ($file_loc==="") {
    error("No image has been selected");
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
    echo "Success";
    $connect->close();
    header('Location: profile.php');
  }else{
      error("Something went wrong");
  }
}else{
    error("Something went wrong");;
}
}
?>