<?php
if (isset($_POST['id'])){

$songID = $_REQUEST['id'] ;

//do as required with the song request :)

include_once("config.php");
include_once("classes/class.Artist.php");
include_once("classes/class.Track.php");
$track = new Track($songID);
echo 'Thanks for requesting '.$track->getTrackName().' by '.$track->getTrackAuthorName();
}