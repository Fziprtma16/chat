<?php
include 'config.php';
$username = $_POST['username'];
$id_socket = $_POST['id_socket'];

$qry = "UPDATE chat SET status = 'READ' WHERE username='admin' AND receiver='$username'";
$sqlqry = mysqli_query($connection,$qry);
if ($sqlqry) {
  echo "Berhasil";
}else{
  echo "gagal";
}

 ?>
