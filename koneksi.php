<?php

$dsn = 'mysql:host=localhost;dbname=prok6648_windwavepredictor';
$username = 'prok6648_windwavepredictor';
$password = 'windwavepredictor';
$options = [];


$dbhost = 'localhost';
$dbuser = 'prok6648_windwavepredictor';
$dbpass = 'windwavepredictor';
$dbname = 'prok6648_windwavepredictor';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}

?>