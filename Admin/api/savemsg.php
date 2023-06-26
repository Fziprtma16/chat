<?php
include 'config.php';

$chat = $_POST['value'];
$id_receive = $_POST['id_penerima'];
$id_send = $_POST['from_chat'];
$username = $_POST['username'];
$user_receive = $_POST['nama_penerima'];
$type = $_POST['type'];
$caption = $_POST['caption'];
$sqlins = "INSERT INTO chat (id_receive,id_send,time,username,receiver,text,text2,caption,status) VALUES ('$id_receive','$id_send',now(),'$username','$user_receive','$chat','$type','$caption','UNREAD')";
$mysqlins = mysqli_query($connection,$sqlins);

if ($mysqlins) {
  echo "success";
  if ($username != "admin") {

    // sendMessage($chat,$username,$id_send);

  }

}else{
  echo "Failde";
}

function sendMessage($value,$username,$id_send) {
    $content      = array(
        "en" => $value
    );
    $heading = array(
      "en" => 'Pesan Dari '.$username
  );

    $fields = array(
        'app_id' => "d9fe42ff-ca7f-4694-baad-cae42766637f",
        'included_segments' => array(
            'Subscribed Users'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'headings' => $heading,
          "url" => "./admin.html?idS=".$id_send."&username=".$username
    );

    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ZDY5MDBhYmMtNTBmZS00MTc3LTlmNjktZDBlYWU3MTAwYjZl'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}


 ?>
