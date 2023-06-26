<?php
include 'config.php';

$username = $_GET['username'];
$isidtl = substr($username, 0, strlen($username) - 1);
$pecah = explode('|',$isidtl);
$jumlah = count($pecah);
$i = 0 ;
$result = array();
for ($i=0; $i < $jumlah ; $i++) {
  $name = $pecah[$i];

  if ($name != "") {
    $get_chat = "SELECT COUNT(*) AS total_chat , id_send AS id_socket FROM chat WHERE  username='$name' AND receiver='admin' AND status = 'UNREAD'";
    $sql_chat = mysqli_query($connection,$get_chat);
    $data = mysqli_fetch_array($sql_chat);
      array_push($result,array(
        "jumlah" => $data['total_chat'],
        "idS" => $data['id_socket']
      ));
  }

}
// $id_receive = $_GET['id'];



echo json_encode(array("result" => $result));
 ?>
