<?php

class Artist
{

    function __construct($id)
    {
        $this->setUpDB();
        $this->artistID = $id;
        $this->setArtistName();
        $this->setTracks();

    }

    function setUpDB()
    {
        global $mysqli;
        $this->db = $mysqli;
    }

    function setArtistName()
    {
        $sql = "SELECT `name` FROM `artist` WHERE `id` = '".$this->artistID."'";

        $res = $this->db->query($sql);
        $row = $res->fetch_assoc();
        $this->artistName = $row['name'];

    }

    function getArtistName()
    {
        return $this->artistName;
    }

    function setTracks()
    {
        $tracksArray = array();
        $sql = "select * from tracks where `artist` = '".$this->artistID."'";
        $datas = $this->db->query($sql);
        while($row = $datas->fetch_assoc()){
            $track = array();
            $track['id'] = $row['id'];
            $track['title'] = $row['name'];
            $tracksArray[] = $track;
        }

        $this->tracksArray = $tracksArray;

    }

    function getTracks()
    {
        return $this->tracksArray;
    }

    public static function getAllArtists()
    {
        global $mysqli;
        $db = $mysqli;
        $artistsArray = array();
        $sql = "select * from artist";
        $datas = $db->query($sql);
        while($row = $datas->fetch_assoc()){
            $artist = array();
            $artist['id'] = $row['id'];
            $artist['name'] = $row['name'];
            $artistsArray[] = $artist;
        }

        return $artistsArray;
    }







}

