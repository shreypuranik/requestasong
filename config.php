<?php

$user = 'USERNAME';
$password = 'PASSWORD';
$db = 'requestasong';
$host = 'HOST';
$port = 3306;

$mysqli = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}