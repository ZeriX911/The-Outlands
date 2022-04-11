<?php
include_once('connect.php');
$messages = array();
class Message{
    private $sender;
    private $receiver;
    private $text;
    private $timestamp;
    function __construct($sender=$_SESSION['id'],$receiver,$text,$timestamp=date('Y-m-d')){
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->text = $text;
        $this->timestamp = $timestamp;
        return $this;
    }
    function get_sender(){
        return $this->sender;
    }    
    function get_reciever(){
        return $this->receiver;
    }
    function get_text(){
        return $this->text;
    }
    function get_timestamp(){
        return $this->timestamp;
    }
}
function get_messages(){
    global $connect;
    $db='apexlfg';
    $query="Select * from msg where sender=".$_SESSION['id']." OR receiver=".$_SESSION['id'].";";
    $res = $connect->query($query);
    while($row = $res->fetch_row())
    {
        array_push($messages, new Message($row[0],$row[1],$row[2],$row[3]));
    }
}
function send_message($receiver,$message){
    global $connect;
    $db='apexlfg';
    $query = "INSERT INTO `msg`( `sender`, `receiver`, `msg`) 
    VALUES ('".$_SESSION['id']."','".$receiver."','".$message."')";
    $end = $connect->query($query)
    $connect->close();
    if($end){
        header("Location: /pages/messaging.php?message=Success happyface");
        exit;
    }else{
        header("Location: /pages/messaging.php?message=No success sadface");
        exit;
    }    
}
if (isset($_POST['messageSend'])) {
    $reciever = $_POST['reciever'];
    $msg = $_POST['msg'];
    $new_msg = new Post(receiver:$reciever,text:$msg);
    array_push($messages,$new_msg)
    send_message($post);
   var_dump("hello");
}







?>