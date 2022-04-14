<?php
include_once("connect.php");
$messages = array();
class Message{
    private $sender;
    private $receiver;
    private $text;
    private $timestamp;
    
    function __construct($receiver,$text,$timestamp="",$sender=""){
        if ($sender ==="") {
            $this->sender = $_SESSION['id'];
            
        }else{
            $this->sender = $sender;
        }
       
        $this->receiver = $receiver;
        $this->text = $text;
        if($timestamp==="")
        {
           $this->timestamp= date('Y-m-d');
        }else{
            $this->timestamp = $timestamp;
        }
        
        return $this;
    }
    function get_sender(){
        return $this->sender;
    }    
    function get_receiver(){
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
    global $messages;
    $db='apexlfg';
    $query="Select * from msg where sender=".$_SESSION['id']." OR receiver=".$_SESSION['id'].";";
    $res = $connect->query($query);

    while($row = $res->fetch_row())
    {
        array_push($messages, new Message($row[2],$row[3],$row[4],$row[1]) );
    }
}
function send_message($receiver,$message){
    global $connect;
    $db='apexlfg';
    $query = "INSERT INTO `msg`( `sender`, `receiver`, `msg`) 
    VALUES (".$_SESSION['id'].",".$receiver.",'".$message."')";
    $end = $connect->query($query);
    $connect->close();
    if($end){
        header("Location: /pages/messenger.php?message=Success happyface");
        exit;
    }else{
        header("Location: /pages/messenger.php?message=No success sadface");
        exit;
    }    
}

if (isset($_POST['messageSend'])) {
    $receiver = $_POST['receiver'];
    $msg = $_POST['msg'];
    send_message($receiver,$msg);
   var_dump("hello");
}







?>