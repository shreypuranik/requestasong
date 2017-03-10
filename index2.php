<?php
include_once("config.php");
include_once("classes/class.Search.php");
?>

<html>
<title>Request A Song</title>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<style>
    .footerbox{
        background: #d25143;
        color: white;
    }

    .bs_input{
        width: 50%;
    }

    .portal-start {
        margin-top: 10px;
    }

    #radioForm ul {
        list-style-type: none;
    }
</style>
</head>
<body>
<div class="row footerbox">
    <div class="col-sm-10 ">
        <h2>Request a song</h2>
    </div>
    <div class="col-sm-2">
    </div>

</div>

<div class="row">
    <div class="col-sm-2 ">
        </div>

    <div class="col-sm-9 portal-start">
        <p>Welcome to the Request A Song portal. Search for the name of the artist or group you want to request a song from. </p>
<form name="radioForm" id="radioForm">
    <ul>
        <li>What do you want to listen to? : <input type="text" name="searchParam" id="searchParam" class="bs_input"></li>
    </ul>

</form>

<div id="tracks">

</div>

        </div>
    <div class="col-sm-1 ">
        </div>
    </div>

<script>
    $('#searchParam').on('input', function() {
        var searchParam = $("#searchParam").val();

            $("#tracks").empty();
            $.get('results.php?type=mass&param='+searchParam, function(data){
                var selectionString = ""
                for(i=0; i< data.length; i++){
                    selectionString += " <a href='#' class='list-group-item list-group-item-action' onClick='requestSong("+data[i].id+");' data-id='"+data[i].id+"'><strong>"+data[i].artist+"</strong> "+data[i].name+"</a>";
                }

                $("#tracks").html('<div class="list-group">'+selectionString+'</div>');


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
</body>
</html>




