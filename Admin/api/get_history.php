<?php
include 'config.php';

$name = $_GET['username'];
$rooms = $_GET['rooms'];
// $id_receive = $_GET['id'];
$result= array();
$get_chat = "SELECT * FROM chat WHERE  (username='admin' AND receiver='$name') OR (username='$name' AND receiver='admin') AND rooms = '$rooms'";
// echo $get_chat;
$sql_chat = mysqli_query($connection,$get_chat);
while($data = mysqli_fetch_array($sql_chat)){
  array_push($result,array(
    "username_send" => $data['username'],
    "username_receive" => $data['receiver'],
    "id_receive" => $data['id_receive'],
    "id_send" => $data['id_send'],
    "value" => $data['text'],
    "time" => $data['time'],
    "type" => $data['text2'],
    "caption" => $data['caption']
  ));
}

echo json_encode(array("result" => $result));
 ?>
