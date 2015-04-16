<?php
include_once("config.php");
include_once("classes/class.Artist.php");
$artists = Artist::getAllArtists();
?>
<script src="jquery-1.11.2.min.js"></script>

<style>
#artists{
    width: 40%;
    float: left;
    border: 1px solid blue;
}
#tracks{
    width: 50%;
    float: right;
    border: 1px solid red;
}




</style>
<h2>Request a song: A simple PHP & MYSQL based music request system</h2>

<div id="artists">

<ul>
    <?php
    foreach($artists as $artist){
        echo "<li class='artistClick' data-id='".$artist['id']."'>".$artist['name']."</li>";
    }

   ?>


</ul>
    </div>

<div id="tracks">

</div>

<div style="clear:both;"></div>

<script>
    $( document ).ready(function() {
        $(".artistClick").click(function(){
           var artist_id = $(this).attr('data-id');
           console.log(artist_id);
            $("#tracks").empty();
            $.get('results.php?id='+artist_id, function(data){
               //console.log(data);
                var selectionString = ""
                    for(i=0; i< data.length; i++){

                        selectionString += "<li class= 'requestThisSong' onClick='requestSong("+data[i].id+");' data-id='"+data[i].id+"'>"+data[i].title+"</li>";
                    }

                $("#tracks").html('<ul>'+selectionString+'</ul>');


            });



        });


    });

    function requestSong(song){
        // Send the data using post
        var postRequest = $.post( 'submit.php', { id: song } );
        postRequest.done(function( response ) {
            alert(response);
        });
    }






</script>