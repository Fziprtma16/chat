<?php
session_start();
 ?>
 <!doctype html>
 <html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="main.css" />
   <title></title>
  </head>
 <style>
 @import url('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i');

 * {
     margin: 0;
     padding: 0;
   box-sizing: border-box;
 }

 body {
     font-family: 'Lato', sans-serif;
     font-size: 14px;
     color: #999999;
     word-wrap: break-word;
     width: 100%;

 }

 ul {
     list-style: none;
 }

  .chatbox-holder {
    position: fixed;
    /* left: 1000; */
    width: auto;
    bottom: 0;
    /* Atur Rata Kanan dan Kiri */
    right: 0;
    display: flex;
    /* align-items: flex-end; */
    padding: 4px 4px;
     z-index: 9999;
    /* height: 0; */
  }

  .chatbox {
    width: 430px;
    height: 500px;
    margin: 0 20px 0 0;
    position: relative;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
    display: flex;
    flex-flow: column;
    border-radius: 10px 10px 0 0;
    background: white;
    bottom: 0;
    transition: .1s ease-out;
    /* z-index: 9999; */
  }

  .chatbox-top {
    position: relative;
    display: flex;
    padding: 10px 0 30px 0px;
    border-radius: 10px 10px 0 0;
    background: #5F4DEE;

  }

  .chatbox-icons {
    padding: 0 10px 0 0;
    display: flex;
    position: relative;
  }

  .chatbox-icons .fa {
    background: rgba(220, 0, 0, .6);
    padding: 3px 5px;
    margin: 0 0 0 3px;
    color: white;
    border-radius: 0 5px 0 5px;
    transition: 0.3s;
  }

  .chatbox-icons .fa:hover {
    border-radius: 5px 0 5px 0;
    background: rgba(220, 0, 0, 1);
  }

  .chatbox-icons a, .chatbox-icons a:link, .chatbox-icons a:visited {
    color: white;
    font-size: 20px;
  }

  .chat-partner-name, .chat-group-name {
    flex: 1;
    padding: 0 0 0 95px;
    font-size: 15px;
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 0 black;
    transition: .1s ease-out;
  }

  .status {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: inline-block;
    box-shadow: inset 0 0 3px 0 rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(0, 0, 0, 0.15);
    background: #cacaca;
    margin: 0 3px 0 0;
  }

  .online {
    background: #b7fb00;
  }

  .away {
    background: #ffae00;
  }

  .donot-disturb {
    background: #ff4343;
  }

  .chatbox-avatar {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%;
    background: white;
    padding: 3px;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
    position: absolute;
    transition: .1s ease-out;
    bottom: 10px;
    left: 6px;
  }

  .chatbox-avatar img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
  }

  .chat-messages {
    border-top: 1px solid rgba(0, 0, 0, .05);
    padding: 10px;
    overflow: auto;
    display: flex;
    flex-flow: row wrap;
    align-content: flex-start;
    flex: 1;
    background-color: #fff;
  }

  .message-box-holder {
    width: 100%;
    margin: 0 0 15px;
    display: flex;
    flex-flow: column;
    align-items: flex-end;
  }

  .message-sender {
    font-size: 12px;
    margin: 0 0 8px;
    color: #30649c;
    align-self: flex-start;
  }

  .message-receive {
    font-size: 12px;
    margin: 0 0 10px;
    color: #30649c;
    align-self: flex-end;
      /* border-bottom: 1px solid #aaa; */
  }

  .message-sender a, .message-sender a:link, .message-sender a:visited, .chat-partner-name a, .chat-partner-name a:link, .chat-partner-name a:visited {
    color: white;
    text-decoration: none;
    font-size: 20px;
  }

  .message-box {
    padding: 6px 10px;
    border-radius: 6px 0 6px 0;
    /* position: relative; */
    background:#5F4DEE;
    border: 2px solid rgba(100, 170, 0, .1);
    border-radius: 16px 16px 16px 16px;
    -webkit-border-radius: 16px 16px 16px 16px;
    -moz-border-radius: 16px 16px 16px 16px;
    color: white;
    font-size: 13px;

  }

  .message-box:after {
    content: "";
    position: absolute;
    border: 10px solid transparent;
    border-top: 10px solid rgba(100, 170, 0, .2);
    border-right: none;
    bottom: -22px;
    right: 10px;
  }

  .message-partner {
    background: #2d8a62;
    margin-left: 30px;
    border: 2px solid rgba(0, 114, 135, .1);
    align-self: flex-start;
  }

  /* .message-partner:after {
    right: auto;
    bottom: auto;
    top: -22px;
    left: 9px;
    border: 10px solid transparent;
    border-bottom: 10px solid rgba(0, 114, 135, .2);
    border-left: none;
  } */

  .chat-input-holder {
    background: white;
    color:black;
    display: flex;
    border-top: 1px solid rgba(0, 0, 0, .1);
  }

  .chat-input {
    resize: none;
    padding: 5px 10px;
    height: 60px;
    font-family: 'Lato', sans-serif;
      font-size: 14px;
    color: #999999;
    flex: 1;
    border: none;
    background: rgba(0, 0, 0, .05);
     border-bottom: 1px solid rgba(0, 0, 0, .05);
  }


  .chat-input:focus, .message-send:focus {
    outline: none;
  }

  .message-send::-moz-focus-inner {
      border:0;
      padding:0;
  }

  .message-send {
    -webkit-appearance: none;
    /* background: #9cc900; */
    /* background: -moz-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -webkit-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -o-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: -ms-linear-gradient(180deg, #00d8ff, #00b5d6);
    background: linear-gradient(180deg, #00d8ff, #00b5d6); */
    color: white;
    font-size: 12px;
    padding: 10px 15px;
    border: none;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
  }

  .attachment-panel {
    padding: 3px 10px;
    text-align: right;
  }

  .attachment-panel a, .attachment-panel a:link, .attachment-panel a:visited {
    margin: 0 0 0 7px;
    text-decoration: none;
    color: rgba(0, 0, 0, 0.5);
  }

  .chatbox-min {
    margin-bottom: -362px;
  /*   height: 46px; */
  }

  .chatbox-min .chatbox-avatar {
    width: 60px;
    height: 60px;
  }

  .chatbox-min .chat-partner-name, .chatbox-min .chat-group-name {
    padding: 0 0 0 75px;
  }

  .settings-popup {
    background: white;
      border-radius: 20px/10px;
      box-shadow: 0 3px 5px 0 rgba(0, 0, 0, .2);
    font-size: 13px;
      opacity: 0;
      padding: 10px 0;
      position: absolute;
      right: 0;
      text-align: left;
      top: 33px;
      transition: .15s;
      transform: scale(1, 0);
      transform-origin: 50% 0;
      width: 120px;
    z-index: 2;
    border-top: 1px solid rgba(0, 0, 0, .2);
    border-bottom: 2px solid rgba(0, 0, 0, .3);
  }

  .settings-popup:after, .settings-popup:before {
    border: 7px solid transparent;
      border-bottom: 7px solid white;
      border-top: none;
      content: "";
      position: absolute;
      left: 45px;
      top: -10px;
    border-top: 3px solid rgba(0, 0, 0, .2);
  }

  .settings-popup:before {
    border-bottom: 7px solid rgba(0, 0, 0, .25);
    top: -11px;
  }

  .settings-popup:after {
    border-top-color: transparent;
  }

  #chkSettings {
      display: none;
  }

  #chkSettings:checked + .settings-popup {
      opacity: 1;
      transform: scale(1, 1);
  }

  .settings-popup ul li a, .settings-popup ul li a:link, .settings-popup ul li a:visited {
    color: #999;
    text-decoration: none;
    display: block;
    padding: 5px 10px;
  }

  .settings-popup ul li a:hover {
    background: rgba(0, 0, 0, .05);
  }


     #chat-circle {
      bottom: 0;
    position: fixed;
  /*  bottom: 50px;*/
    /* left: 50px; */
    right: 0;
    /* background: #5A5EB9; */
    width: 25px;
    height: 45px;
    /* border-radius: 50%; */
    color: white;
    padding-top: 5px;
   /* padding: 28px; */
    cursor: pointer;
    /* box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12); */
  }

  .btn#my-btn {
       background: white;
      padding-top: 13px;
      padding-bottom: 12px;
      border-radius: 45px;
      padding-right: 40px;
      padding-left: 40px;
      color: #5865C3;
  }
  #chat-overlay {
      background: rgba(255,255,255,0.1);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      display: none;
  }
  .chatbutton {
    width: 70px;
    height: 70px;
    position: fixed;
    bottom: 20px;
    /* Mengatur Kanan Kiri Gambar */
    right: 20px;
    z-index: 100;
  }
  .file_img{
     background: rgba(0, 0, 0, .05);
    padding: 10px 15px;

  }

  .popup {
   display: none; /* Mulai dengan popup tersembunyi */
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: rgba(0, 0, 0, 0.5); /* Latar belakang transparan */
   z-index: 9999; /* Menempatkan popup di atas elemen lain */
 }

 .popup-content {
   background-color: #fff;
   max-width: 400px;
   margin: 100px auto; /* Posisikan popup di tengah secara vertikal */
   padding: 20px;
   text-align: center;
 }

 /* Animasi untuk memunculkan popup */
 .popup.show {
   display: flex;
   align-items: center;
   justify-content: center;

 }

 .avatar_img{

   /* margin-right: 10px; */

   width: 45px;
   padding: 5px;
 }
 .avatar_img_admin{

   /* margin-right: 10px; */

   width: 45px;
   padding: 5px;
 }
 .span_avatar{
   color: #30649c;
   font-size: 12px;
   font-weight: bold;
 }





 </style>

<div id="popup" class="popup">
  <div class="popup-content">
    <div style="align-items: flex-end;">
   <!--    <a href="javascript:void(0);"><i id="click" class="fa fa-minus"></i></a> -->
    </div>
    <h3>Kirim Gambar</h3>
    <br>
    <canvas style="width:350px;height:300px" id="our-canvas" class="image-container"></canvas>
    <input type="text" hidden  id="Base64IMG">
    <input type="text" placeholder="Caption" class="form-control" style="margin-top:50px;" id="caption_img">
    <br>
    <button type="button" onclick="send_img()" class="btn btn-primary">Send</button>
    <button type="button" onclick="closePopup()" class="btn btn-danger mr-3">Cancel</button>
  </div>
</div>



 <h1 id="name" style="display:none;"></h1>
   <h1 style="display: none;" id="log"></h1>
   <h1 style="display: none;" id="idnya"></h1>
 <!-- <input type="text" placeholder="Email" id="username"> -->
 <input type="text" hidden id="socketID">
 <input type="text" hidden id="socketIDAdmin">

 <!-- <button onclick="joined()" style="display:none;" id="submit">Submit</button> -->

 <div class="chatbutton ">
  <a href="javascript:void(0);" class="click-show">
    <span id="jmlhchat" style="position:absolute;top:-15px;right:-5px;font-size:12px;display:none;" class="translate-middle badge rounded-pill text-dark bg-info">
      0
    </span>
    <img src="widget/live-chat.png" id="gambar_widget" style="width:80px;"  alt="Chat-Button">
  </a>
 </div>

 <div id="displaychat" style="display:none;">
   <div class="chatbox-holder">
       <div class="chatbox" id="chatbbox">
         <div class="chatbox-top">
           <div class="chatbox-avatar">
             <a target="_blank" href=""><img id="icon_admin" src="https://cdn-icons-png.flaticon.com/128/2543/2543339.png" /></a>
           </div>
           <div class="chat-partner-name">
             <!-- <span id="status" class="status donot-disturb"></span> -->
             <a target="_blank" id="nama_admin" href="">Live Chat</a>
           </div>
           <div class="chatbox-icons">
          <!--    <a href="javascript:void(0);"><i id="click" class="fa fa-minus"></i></a> -->
             <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
           </div>
         </div>
         <div class="container-fluid col-lg-12 p-4" id="form_layanan">
           <h3>Hallo ... 👋</h3>
           <div class="list-group"  id="groupLayanan">
           </div>
 <br>
 <button class="btn btn-info text-white" onclick="MenghubugkanAdmin()">Hubungkan Saya Ke Admin</button>
          </div>
         <div class="container-fluid col-lg-12 " style="display:none;" id="form_login">
           <input type="text" placeholder="Email" class="form-control" style="margin-top:50px;" id="username">
           <br>

           <button onclick="joined()" class="btn btn-info float-left text-white" id="submit">Submit</button>
          </div>

         <div class="chat-messages" id="chhhtt">
            <!-- <div class="message-box-holder">
             <div class="message-box">
               Hello Gaessss !!!
             </div>
           </div> -->
         </div>

         <div class="chat-input-holder" style="display:none;" id="form_chat">
           <textarea id="pesan" placeholder="Write Your Message" class="chat-input"></textarea>
           <div class="file_img">
             <i class="fa fa-image fa-xl" onclick="openFILE()"></i>
           </div>
           <input id="fileid" onchange="return validasiEkstensi() " type="file" hidden/>

           <button type="submit"  onclick="Submit_Pesan()" class="message-send" />
           <img src="https://cdn-icons-png.flaticon.com/128/9131/9131510.png" style="width:20px;margin-bottom: 20px;color:blue;" alt="">
         </button>

         </div>
               <small>&copy; 2023 Powered By CrashTeam.</small>
       </div>
     </div>
   </div>

   <!-- <script src="widget/jquery.min.js"></script> -->

   <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <!-- <script src="widget/socket.io-client/socket.io.js"></script> -->
    <script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pako/2.0.4/pako.min.js"></script>
    <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
   <script type="text/javascript">
   var linkSources = [
  'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
];

linkSources.forEach(function(href) {
  var link = document.createElement('link');
  link.href = href;
  link.setAttribute('rel', 'stylesheet');
  link.setAttribute('type', 'text/css');
  document.head.appendChild(link);
});
   var scriptSources = [
     'https://code.iconify.design/2/2.2.0/iconify.min.js',
     'https://cdn.socket.io/3.1.3/socket.io.min.js',
     'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js',
     'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js',
     'https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js',
     'https://cdnjs.cloudflare.com/ajax/libs/pako/2.0.4/pako.min.js'
   ];
   scriptSources.forEach(function(src) {
  var script = document.createElement('script');
  script.src = src;
  script.setAttribute('type', 'text/javascript');
  document.head.appendChild(script);
});

   var roomsID = "AP_001";
 GetLayananBot()
 AturStyle()
 $('.fa-minus').click(function() {
   $(this).closest('.chatbox');
   $("#displaychat").css("display", "block");
 });
 $('.click-show').click(function() {
   $(this).closest('.chatbox');
   $('.click-show').css("display", "none");
   $("#wa_class").css("display", "none");
   $("#displaychat").css("display", "block");
 });
 $('.fa-close').click(function() {
   $("#wa_class").css("display", "block");
   $('.click-show').css("display", "block");
   $("#displaychat").css("display", "none");
 });
 var Status_admin = $("#status");
 var $messages = $('.messages');
 var $areapesan = $(".chat-messages");
 var $areabalas = $("#AreaBalas");
 var connectionOptions = {
   "force new connection": true,
   "reconnectionAttempts": "Infinity", //avoid having user reconnect manually in order to prevent dead clients after a server restart
   "timeout": "Infinity", //before connect_error and connect_timeout are emitted.
   "transports": ["websocket"]
 };
 var socket = io('https://chat.pertalis.com/');

 function bukachat(ids) {
   $('.min' + ids).click(function() {
     $(this).closest('.cht' + ids).toggleClass('chatbox-min');
   });
   $('.fa-close').click(function() {
     $(this).closest('.chatbox').hide();
   });
 }

 function AturStyle() {
   var urls = "https://pertalis.com/chat_apps/Admin/api/get_config.php?rooms=" + roomsID;
   $.get(urls, function(response) {
     var obj = JSON.parse(response);
     if (obj.url_gambar != "") {
       $("#gambar_widget").attr("src", obj.url_gambar);
     }
     if (obj.posisi_widget != "") {
       if (obj.posisi_widget == "right") {
         $(".chatbox-holder").css("right", "0");
         $(".chatbox-holder").css("left", "auto");
         $(".chatbutton").css("right", "20px");
         $(".chatbutton").css("left", "auto");
       }
       else if (obj.posisi_widget == "left") {
         $(".chatbox-holder").css("left", "0");
         $(".chatbox-holder").css("right", "auto");
         $(".chatbutton").css("left", "20px");
         $(".chatbutton").css("right", "auto");
       }
       if (obj.icon_admin != "") {
         $("#icon_admin").attr("src", obj.icon_admin);
       }
       if (obj.nama_widget != "") {
         $("#nama_admin").text(obj.nama_widget);
       }
       if (obj.warna_top != "") {
         $(".chatbox-top").css("background", obj.warna_top);
       }
     }
   });
 }

 function GetLayananBot() {
   var url = "https://pertalis.com/chat_apps/Admin/api/get_layanan.php?rooms=" + roomsID;
   $.getJSON(url, function(data) {
     $("#groupLayanan").empty();
     $.each(data.result, function() {
       $("#groupLayanan").append('<a href="' + this['link'] + '" class="list-group-item list-group-item-action list-group-item-info">' + this['NamaLayanan'] + '</a>');
     });
   });
 }

 function MenghubugkanAdmin() {
   $("#form_login").css("display", "block");
   $("#form_layanan").css("display", "none");
 }
 // joined();
 function joined() {
   $(".chat-messages").LoadingOverlay("show", {
     background: "rgba(243, 243, 243, 0.65)",
     image: "",
     text: "Menghubungkan Chat ",
     textAutoResize: true,
     textResizeFactor: '0,5'
   });
   var validasiHuruf = /^[a-zA-Z]+$/;
   var nama = $("#username").val();
   if (nama.indexOf("@") != -1 && nama.indexOf(".") != -1) {
     // console.log("Nama Anda adalah " + nama.value);
     var username = $("#username").val();
     // console.log(username);
     $("#form_login").css("display", "none");
     $("#form_chat").css("display", "flex");
     Login(username, roomsID);
   }
   else {
     alert("Masukan Format Email Dengan Benar");
   }
 }



 function Login(usernameLog, Rooms) {
   socket.emit('create-session', {
     username: usernameLog,
     rooms: Rooms
   });
   socket.emit('get online users');
   socket.on('daftar user pertalis', function(value) {
     var usernameUser = $("#username").val();
     for (let i = 0; i < value.length; i++) {
       var datax = value[i];
       if (datax.username == "admin" && datax.rooms == Rooms) {
         $("#socketIDAdmin").val(datax.idS);
       }
       else if (datax.username == usernameUser && datax.rooms == Rooms) {
         getUnreadMessage(usernameUser, datax.idS)
         console.log(datax.idS + " " + datax.username);
       }
     }
   });
   socket.on('login', (datavalue) => {
     console.log(datavalue);
     if (datavalue.rooms == roomsID) {
       getUsers(datavalue.users, datavalue.id, datavalue.rooms);
       get_history(datavalue.users, datavalue.id, datavalue.rooms);
     }
   });
   socket.on('user join', (datavalue) => {
     console.log(datavalue);
   });
   socket.on('pesan', function(valmsg) {
     if (valmsg.rooms == roomsID) {
       $('.click-show').css("display", "none");
       $("#wa_class").css("display", "none");
       $("#displaychat").css("display", "block");
       NewPesan(valmsg.value, valmsg.username, valmsg.nameto);
     }
   })
   socket.on('pesan_img', function(valmsg) {
     // console.log(valmsg.base64);
     if (valmsg.rooms == roomsID) {
       $('.click-show').css("display", "none");
       $("#wa_class").css("display", "none");
       $("#displaychat").css("display", "block");
       NewPesan_img(valmsg.base64, valmsg.username, valmsg.nameto, valmsg.caption);
     }
   })
   socket.on('user_pergi', (data) => {
     // console.log(data.username);
     log(data.username, data.id, data.username + ' left');
   });
   socket.on('disconnect', () => {
     setTimeout(() => {
       joined() // Terhubung kembali ke server Socket.IO
     }, 5000);
     // log('','','you have been disconnected');
   });
 }

 function getUsers(username, idusers) {
   $("#name").html(username);
   $("#socketID").val(idusers);
 }

 function log(username, iduser, status) {
   $("#log").append("<ul>" + status + "</ul>");
 }
 const NewPesan = (value, username, nameto) => {
   var idS = $("#socketID").val();
   var usernamex = $("#username").val();
   // console.log(username);
   // console.log(nameto);
   var nameTo = nameto.toLowerCase();
   var usernamexx = usernamex.toLowerCase();
   // Membuat objek Date baru
   var sekarang = new Date();
   // Mengambil informasi waktu
   var tahun = sekarang.getFullYear(); // Tahun empat digit (contoh: 2023)
   var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0'); // Bulan (0 - 11, tambahkan 1 untuk mendapatkan bulan 1 - 12)
   var tanggal = sekarang.getDate(); // Tanggal (1 - 31)
   var jam = sekarang.getHours(); // Jam (0 - 23)
   var menit = sekarang.getMinutes(); // Menit (0 - 59)
   var detik = sekarang.getSeconds(); // Detik (0 - 59)
   // Membuat format waktu
   var formatWaktu = tahun + '-' + bulan + '-' + tanggal + ' ' + jam + ':' + menit + ':' + detik;
   if (username == "admin" && nameTo == usernamexx) {
     bunyi()
     getUnreadMessage(usernamex, idS)
     $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div style="margin-bottom:15px;">' + formatWaktu + '</div>' + '<div class="message-box message-partner">' + value + '</div>' + '</div>');
   }
   else if (usernamex == "admin") {
     $areapesan.append('<div class="message-box-holder">' + '<div class="message-sender"> <i class="fa fa-reply" onclick="reply(\'' + username + '\',\'' + value + '\')"></i>  ' + username + '</div>' + '<div class="message-box message-partner">' + value + '</div>' + '</div>');
   }
   else if (nameto == usernamex) {
     $areapesan.append('<div class="message-box-holder">' + '<div class="message-sender">' + username + '</div>' + '<div class="message-box message-partner">' + value + '</div>' + '</div>');
   }
 }
 const NewPesan_img = (base64, username, nameto, caption) => {
   var usernamex = $("#username").val();
   var idS = $("#socketID").val();
   var sekarang = new Date();
   // Mengambil informasi waktu
   var tahun = sekarang.getFullYear(); // Tahun empat digit (contoh: 2023)
   var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0'); // Bulan (0 - 11, tambahkan 1 untuk mendapatkan bulan 1 - 12)
   var tanggal = sekarang.getDate(); // Tanggal (1 - 31)
   var jam = sekarang.getHours(); // Jam (0 - 23)
   var menit = sekarang.getMinutes(); // Menit (0 - 59)
   var detik = sekarang.getSeconds(); // Detik (0 - 59)
   // Membuat format waktu
   var formatWaktu = tahun + '-' + bulan + '-' + tanggal + ' ' + jam + ':' + menit + ':' + detik;
   getUnreadMessage(usernamex, idS)
   if (username == "admin" && nameto == usernamex) {
     bunyi();
     $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + formatWaktu + '</div>' + '<div class="message-box message-partner">' + '<p><img style="width:100%;" onclick="zoomin(this.id);zoomout(this.id);return false;" id="' + base64 + '" src="' + base64 + '"><p>' + '<p>' + caption + '</p>' + '</div>' + '</div>');
   }
   else if (usernamex == "admin") {
     $areapesan.append('<div class="message-box-holder">' + '<div class="message-sender"> <i class="fa fa-reply" onclick="reply(\'' + username + '\',\'' + value + '\')"></i>  ' + username + '</div>' + '<div class="message-box message-partner">' + value + '</div>' + '</div>');
   }
   else if (username == usernamex) {
     $areapesan.append('<div class="message-box-holder">' + '<div class="message-sender">' + username + '</div>' + '<div class="message-box message-partner">' + '<p><img src="' + base64 + '"><p>' + '<p>' + caption + '</p>' + '</div>' + '</div>');
   }
 }

 function zoomin(id) {
   var GFG = document.getElementById(id);
   var currWidth = GFG.clientWidth;
   GFG.style.width = (currWidth + 100) + "px";
 }

 function zoomout(id) {
   var GFG = document.getElementById(id);
   GFG.addEventListener('contextmenu', function(event) {
     event.preventDefault(); // Mencegah menu konteks muncul
     // Ambil posisi kursor saat klik kanan
     var x = event.clientX;
     var y = event.clientY;
     // Panggil fungsi yang akan dieksekusi saat klik kanan
     var currWidth = GFG.clientWidth;
     GFG.style.width = (currWidth - 20) + "px";
   });
 }
 const NewAdmin = (value, username) => {
   $areabalas.append('  <div class="message-box-holder">' + '<div class="message-receive">' + username + '</div>' + '<div class="message-box">' + value + '</div></div>')
 }
 const Submit_Pesan = () => {
   var isipesan = $("#pesan").val();
   var idS = $("#socketID").val();
   var idAdmin = $("#socketIDAdmin").val();
   var username = $("#username").val();
   // Membuat objek Date baru
   var sekarang = new Date();
   // Mengambil informasi waktu
   var tahun = sekarang.getFullYear(); // Tahun empat digit (contoh: 2023)
   var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0'); // Bulan (0 - 11, tambahkan 1 untuk mendapatkan bulan 1 - 12)
   var tanggal = sekarang.getDate(); // Tanggal (1 - 31)
   var jam = sekarang.getHours(); // Jam (0 - 23)
   var menit = sekarang.getMinutes(); // Menit (0 - 59)
   var detik = sekarang.getSeconds(); // Detik (0 - 59)
   // Membuat format waktu
   var formatWaktu = tahun + '-' + bulan + '-' + tanggal + ' ' + jam + ':' + menit + ':' + detik;
   if (idAdmin == "") {
     alert("Admin Belum Ready ");
     return false;
   }
   socket.emit('message', isipesan, idAdmin, roomsID);
   $areapesan.append('<div class="message-box-holder">' +
   '<div style="display:inline-block;" >' +
   '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' +
   '<div   style="display:inline-block;">' +
   '<span class="span_avatar">' + username +
   '</span>' + '<div style="margin-bottom:15px;">' + formatWaktu +
   '</div>' +
   '</div>'+
   '</div>'+
   '<div class="message-box">' + isipesan +
   '</div>' +
   '</div>');
   $("#pesan").val("");
 }

 function getUnreadMessage(username, idsocket) {
   var url = "https://pertalis.com/chat_apps/Admin/api/get_unreadmessageuser.php?username=" + username + "&id=" + idsocket;
   $.getJSON(url, function(data) {
     $.each(data.result, function() {
       $("#jmlhchat").html(this['jumlah']);
     });
   });
 }

 function get_history(username, idS) {
   var idAdmin = $("#socketIDAdmin").val();
   var url = "https://pertalis.com/chat_apps/Admin/api/get_history.php?username=" + username + "&rooms=" + roomsID + "&idS=" + idS + "&idAdmin=" + idAdmin;
   console.log(url);
   $.getJSON(url, function(data) {
     $areapesan.empty();
     $.each(data.result, function() {
       if (this['username_send'] == "admin") {
         if (this['type'] == "text") {
           $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box message-partner">' + this['value'] + '</div>' + '</div>');
         }
         else {
           $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box message-partner">' + '<p><img  id="' + this['value'] + '" style="width:100%;border-radius:20px;" src="' + this['value'] + '"><p>' + '<p>' + this['caption'] + '</p>' + '</div>' + '</div>');
         }
       }
       else {
         if (this['type'] == "text") {
           $areapesan.append('<div class="message-box-holder">' +
            '<div   style="display:inline-block;">' +
           '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' +
           '<div   style="display:inline-block;">' +
           '<span class="span_avatar">' + this['username_send'] + '</span>' +
           '<div style="margin-bottom:15px;">' + this['time'] + '</div>' +
           '</div>' +
           '</div>'+
           '<div class="message-box ">' + this['value'] +
           '</div>' +
           '</div>');
         }
         else {
           $areapesan.append('<div class="message-box-holder">' + '<div   class="message-receive">' + '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' + '<div style="display:block;width:165px;">' + '<span  class="span_avatar">' + this['username_send'] + '</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box">' + '<p><img id="' + this['value'] + '" style="width:100%;" src="' + this['value'] + '"><p>' + '<p>' + this['caption'] + '</p>' + '</div>' + '</div>');
         }
       }
     });
   }).done(function(json) {
     $(".chat-messages").LoadingOverlay("hide");
   }).fail(function(jqxhr, textStatus, error) {
     alert("Error", "Segera Periksa Internet Anda !", 'error');
   });
 }

 function validation() {
   var validasiHuruf = /^[a-zA-Z]+$/;
   var nama = document.getElementById("username");
   if (nama.value.match(validasiHuruf)) {
     console.log("Nama Anda adalah " + nama.value);
   }
   else {
     alert("Masukkan nama Anda !\nFormat wajib huruf !\nTidak Perlu Menggunakan SPASI !");
     nama.value = "";
     nama.focus();
     return false;
   }
 }
 //Memvalidasi Extensi Upload
 function validasiEkstensi() {
   var idS = $("#socketID").val();
   var inputFile = document.getElementById('fileid');
   var pathFile = inputFile.value;
   var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
   if (!ekstensiOk.exec(pathFile)) {
     alert('Silakan upload file Gambar !');
     inputFile.value = '';
     return false;
   }
   else {
     var base = $("#Base64IMG").val();
     if (base == "") {
       ChangeForm();
     }
     else {
       openPopup();
     }
   }
 }
 //Untuk Open File
 function openFILE() {
   document.getElementById('fileid').click();
 }

 function ChangeForm() {
   const docs = $('#fileid').prop('files')[0];
   var base64 = getBase64(docs);
   handleFile(docs);
   openPopup();
 }
 //Merubah Image Menjadi Base 64
 function getBase64(file) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function() {
     // console.log(reader.result);
     $("#Base64IMG").val(reader.result);
   };
   reader.onerror = function(error) {
     console.log('Error: ', error);
   };
 }
 //Upload File
 function uploadFile(idS) {
   $('#uploadfile').bind('change', function(e) {
     var data = e.originalEvent.target.files[0];
     readThenSendFile(data, idS);
   });
 }
 //Merubah File Menjadi View Canvas
 function handleFile(file) {
   var canvas = document.getElementById('our-canvas'),
     context = canvas.getContext('2d');
   var ImageType = /image.*/;
   if (file.type.match(ImageType)) {
     var reader = new FileReader();
     reader.onloadend = function(event) {
       var tempImageStore = new Image();
       tempImageStore.onload = function(ev) {
         canvas.height = ev.target.height;
         canvas.width = ev.target.width;
         context.drawImage(ev.target, 0, 0);
       }
       tempImageStore.src = event.target.result;
     }
     reader.readAsDataURL(file);
   }
   // openPopup();
 }
 // Fungsi untuk membuka popup
 function openPopup() {
   var popup = document.getElementById('popup');
   // var openPopupBtn = document.getElementById('openPopup');
   popup.classList.add('show');
   $("#wa_class").css("display", "block");
   $('.click-show').css("display", "block");
   $("#displaychat").css("display", "none");
 }
 // Fungsi untuk menutup popup
 function closePopup() {
   var popup = document.getElementById('popup');
   $("#Base64IMG").val('');
   popup.classList.remove('show');
   $('.click-show').css("display", "none");
   $("#wa_class").css("display", "none");
   $("#displaychat").css("display", "block");
 }

 function send_img() {
   var idS = $("#socketIDAdmin").val();
   var base64 = $("#Base64IMG").val();
   var caption = $("#caption_img").val();
   var sock = $("#socketID").val();
   var username = $("#username").val();
   socket.emit('send_img', base64, idS, caption, roomsID);
   let current = new Date();
   let cDate = current.getFullYear() + '-' + (current.getMonth() + 1) + '-' + current.getDate();
   let cTime = current.getHours() + ":" + current.getMinutes() + ":" + current.getSeconds();
   let dateTime = cDate + ' ' + cTime;
   $areapesan.append('<div class="message-box-holder">' + '<div   class="message-receive">' + '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' + '<div style="display:block;width:165px;">' + '<span  class="span_avatar">' + username + '</span>' + '</div>' + dateTime + '</div>' + '<div class="message-box">' + '<p><img style="width:100%;" src="' + base64 + '"><p>' + '<p>' + caption + '</p>' + '</div>' + '</div>');
   $("#Base64IMG").val('');
   $("#caption_img").val('');
   closePopup();
 }

 function bunyi() {
   var bel = new Audio();
   bel.src = 'https://github.com/indriyani13/chat/blob/main/new/smile.ogg';
   bel.play();
 }
   </script>
