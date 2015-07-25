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

    /**
     * Declare the track name
     * @param $data
     */

    function setTrackName($data)
    {
        $this->trackName = $data;
    }

    /**
     * Get the track name
     * @return mixed
     */
    function getTrackName()
    {
        return $this->trackName;
    }


    /**
     * Set the track author ID
     * @param $data
     */

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

    /**
     * Get the Track Author ID
     * for potential new class
     * @return mixed
     */

    function getTrackAuthorID()
    {
        return $this->trackAuthorID;
    }


    /**
     * Get the author name for the track
     * @return mixed
     */

    function getTrackAuthorName()
    {
        return $this->trackAuthorName;
    }


    /**
     * Declare the track via an SQL query
     */
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