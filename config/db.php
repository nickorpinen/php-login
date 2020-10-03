<?php
ob_start(); # Enables the user of headers
if(!isset($_SESSION)){
    session_start();
}

$hostname='localhost';
$username='';
$password='';
$dbname='test';

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")
?>
