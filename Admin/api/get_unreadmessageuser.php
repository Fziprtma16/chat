<?php
include 'config.php';

$username = $_GET['username'];
$id_receive = $_GET['id'];
$result = array();
$get_chat = "SELECT COUNT(*) AS total_chat FROM chat WHERE  username='admin' AND receiver='$username' AND status = 'UNREAD'";
$sql_chat = mysqli_query($connection,$get_chat);
$data = mysqli_fetch_array($sql_chat);

  array_push($result,array(
    "jumlah" => $data['total_chat']
  ));

echo json_encode(array("result" => $result));
 ?>
