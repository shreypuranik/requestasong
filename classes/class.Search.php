<?php

/**
 * Class Search for search methods
 *
 */
class Search
{


    /**
     * Static method to return search results
     * based on supplied parameter. 
     * @param $param
     * @return array
     */

    public static function getResults($param)
    {
        global $mysqli;
        $db = $mysqli;
        $sql = "select t.id as trackid, t.name as trackname, a.name as trackartist
                             from tracks as t
                             join artist as a
                             on t.artist = a.id
                             WHERE `t`.name like '%".$param."%' or a.name like '%".$param."%'";

        $datas = $db->query($sql);
        $tracks = array();
        while($row = $datas->fetch_assoc()){
           $track = array();
           $track['id']= $row['trackid'];
           $track['name'] = $row['trackname'];
           $track['artist'] = $row['trackartist'];
           $tracks[] = $track;
        }

        return $tracks;


    }




}


