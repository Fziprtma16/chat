<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST,PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$connection = mysqli_connect('localhost','u1003949_chat','chat!@#','u1003949_chat');
$connect = new PDO('mysql:host=localhost;dbname=u1003949_chat', 'u1003949_chat', 'chat!@#');

?>
