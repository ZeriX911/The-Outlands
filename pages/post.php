<?php
require_once('connect.php');

class Post{
    private const $createor_id;
    private const $team_name;
    private const $players;
    private const $style;
    private const $desc;

    function __construct($team_name,$players,$style,$desc){
        $this->creator_id = $_SESSION['id'];
        $this->team_name = $team_name;
        $this->players = $players;
        $this->style = $style;
        $this->desc = $desc;
        return $this;
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
    $query = "INSERT INTO `posts`( `creator`, `team_name`, `current_players`, `playstyle`, `description`) VALUES ('".$post->createor_id."','".$post->team_name."','".$post->players."','".$post->style."','".$post->desc."')";
    if(mysql_db_query($db,$query)){
        header("Location: /pages/lfg.php");
    }else{
        header("Location: /pages/createpost.php");
    }

}

if (isset($_POST['form'])) {
    $team_name = $_POST['teamname'];
    $players = $_POST['playercount'];
    $style = $_POST['playstyle'];
    $desc = $_POST['description'];
   $post = new Post($team_name,$players,$style,$desc);
   send_post($post);
}

?>