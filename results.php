<?php
include_once("config.php");
include_once("classes/class.Artist.php");
$id = $_GET['id'];
if ($id){
    $artist = new Artist($id);
    $tracks = $artist->getTracks();
    header('Content-Type: application/json');
    echo json_encode($tracks);
    exit;
}
else{
    $artists = Artist::getAllArtists();
    header('Content-Type: application/json');
    echo json_encode($artists);
    exit;

}
