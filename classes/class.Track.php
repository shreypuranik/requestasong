<?php


class Track
{

    function __construct($id)
    {
        $this->setDB();
        $this->trackID = $id;
        $this->setUpTrack();
    }

    function setDB()
    {
        global $mysqli;
        $this->db = $mysqli;
    }

    function setTrackName($data)
    {
        $this->trackName = $data;
    }

    function getTrackName()
    {
        return $this->trackName;
    }

    function setTrackAuthorID($data)
    {
        $this->trackAuthorID = $data;
        $this->trackAuthorObj = new Artist($this->trackAuthorID);
        $this->trackAuthorName = $this->trackAuthorObj->getArtistName();
    }

    function getTrackAuthorTextFromID($data)
    {
        return "Author";
    }

    function getTrackAuthorID()
    {
        return $this->trackAuthorID;
    }

    function getTrackAuthorName()
    {
        return $this->trackAuthorName;
    }

    function setUpTrack()
    {
        $sql = "select * from tracks where `id` = '".$this->trackID."'";
        $datas = $this->db->query($sql);
        while($row = $datas->fetch_assoc()){
          $this->setTrackName($row['name']);
          $this->setTrackAuthorID($row['artist']);

        }

    }






}