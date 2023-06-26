<?php
include 'config.php';
$username = $_POST['username'];
$id_socket = $_POST['id_socket'];

$qry = "UPDATE chat SET status = 'READ' WHERE username='$username' AND receiver='admin'";
$sqlqry = mysqli_query($connection,$qry);
if ($sqlqry) {
  echo "Berhasil";
}else{
  echo "gagal";
}

 ?>
