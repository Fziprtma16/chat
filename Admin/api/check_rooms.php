<?php
include 'config.php';
$rooms = $_POST['idrooms'];


$qry = "SELECT * FROM rooms WHERE id_rooms = '$rooms' ";
$sqlqry = mysqli_query($connection,$qry);
$cek = mysqli_num_rows($sqlqry);
if (!$cek) {
  echo "tidak";
}else{
  echo "ada";
}

 ?>
