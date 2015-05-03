<?php
include_once("config.php");
include_once("classes/class.Search.php");
?>
<script src="jquery-1.11.2.min.js"></script>

<h2>Request a song: A simple PHP & MYSQL based music request system</h2>

<form name="radioForm" id="radioForm">
    <ul>
        <li>What do you want to listen to? : <input type="text" name="searchParam" id="searchParam"></li>
    </ul>

</form>

<div id="tracks">

</div>

<script>
    $('#searchParam').on('input', function() {
        var searchParam = $("#searchParam").val();

            $("#tracks").empty();
            $.get('results.php?type=mass&param='+searchParam, function(data){
                var selectionString = ""
                for(i=0; i< data.length; i++){
                    selectionString += "<li class= 'requestThisSong' onClick='requestSong("+data[i].id+");' data-id='"+data[i].id+"'><strong>"+data[i].artist+"</strong> "+data[i].name+"</li>";
                }

                $("#tracks").html('<ul>'+selectionString+'</ul>');


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







