<?php


class Track
{

    function __construct($id)
    {
        $this->setDB();
        $this->setUpTrack();
    }


    function setTrackName($data)
    {
        $this->trackName = $data;
    }

    function setTrackAuthorID($data)
    {
        $this->trackAuthorID = $data;
        $this->trackAuthorName = $this->getTrackAuthorTextFromID($data);
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






}