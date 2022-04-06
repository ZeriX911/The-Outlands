<?php
var_dump($connect);
require_once("connect.php");

class Post{
    private  $creator_id;
    private  $team_name;
    private  $players;
    private  $style;
    private  $desc;

    function __construct($team_name,$players,$style,$desc){
        $this->creator_id = $_SESSION['id'];
        $this->team_name = $team_name;
        $this->players = $players;
        $this->style = $style;
        $this->desc = $desc;
        return $this;
    }
    function get_creator_id(){
        return $this->creator_id;
    }
    function get_team_name(){
        return $this->team_name;
    }
    function get_players(){
        return $this->players;
    }
    function get_style(){
        return $this->style;
    }
    function get_desc(){
        return $this->desc;
    }

}

function get_posts(){
    
}

function send_post(Post $post){
    $db='apexlfg';
    $query = "INSERT INTO `posts`( `creator`, `team_name`, `current_players`, `playstyle`, `description`) VALUES ('".$post->get_creator_id()."','".$post->get_team_name()."','".$post->get_players()."','".$post->get_style()."','".$post->get_desc()."')";
    $smt = $connect->prepare($query);
    $smt->execute();
    $connect->close();
}

if (isset($_POST['form'])) {
    $team_name = $_POST['teamname'];
    $players = $_POST['playercount'];
    $style = $_POST['playstyle'];
    $desc = $_POST['description'];
   $post = new Post($team_name,$players,$style,$desc);
   send_post($post);
   var_dump("hello");
}

?>