<?php
include_once("config.php");
include_once("classes/class.Artist.php");
include_once("classes/class.Search.php");

if ($_GET['type']=='mass'){
    $param = $_GET['param'];
    if ($param){
        $tracks = Search::getResults($param);
        header('Content-Type: application/json');
        echo json_encode($tracks);
        exit;
    }

}
else {
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
}