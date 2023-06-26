<?php
session_start();
 ?>
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
   width: 100%;
   bottom: 0;
   left: 0;
   display: flex;
   /* align-items: flex-end; */
   padding: 4px 4px;
   /* height: 0; */
 }

 .chatbox {
   width: 400px;
   height: 400px;
   margin: 0 20px 0 0;
   position: relative;
   box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
   display: flex;
   flex-flow: column;
   border-radius: 10px 10px 0 0;
   background: white;
   bottom: 0;
   transition: .1s ease-out;
 }

 .chatbox-top {
   position: relative;
   display: flex;
   padding: 10px 0;
   border-radius: 10px 10px 0 0;
   background: rgba(0, 0, 0, .05);
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
 }

 .chat-partner-name, .chat-group-name {
   flex: 1;
   padding: 0 0 0 95px;
   font-size: 15px;
   font-weight: bold;
   color: #30649c;
   text-shadow: 1px 1px 0 white;
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
   width: 80px;
   height: 80px;
   overflow: hidden;
   border-radius: 50%;
   background: white;
   padding: 3px;
   box-shadow: 0 0 5px 0 rgba(0, 0, 0, .2);
   position: absolute;
   transition: .1s ease-out;
   bottom: 0;
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
   margin: 0 0 15px;
   color: #30649c;
   align-self: flex-start;
 }

 .message-sender a, .message-sender a:link, .message-sender a:visited, .chat-partner-name a, .chat-partner-name a:link, .chat-partner-name a:visited {
   color: #30649c;
   text-decoration: none;
 }

 .message-box {
   padding: 6px 10px;
   border-radius: 6px 0 6px 0;
   position: relative;
   background: rgba(100, 170, 0, .1);
   border: 2px solid rgba(100, 170, 0, .1);
   color: #6c6c6c;
   font-size: 12px;
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
   background: rgba(0, 114, 135, .1);
   border: 2px solid rgba(0, 114, 135, .1);
   align-self: flex-start;
 }

 .message-partner:after {
   right: auto;
   bottom: auto;
   top: -22px;
   left: 9px;
   border: 10px solid transparent;
   border-bottom: 10px solid rgba(0, 114, 135, .2);
   border-left: none;
 }

 .chat-input-holder {
   display: flex;
   border-top: 1px solid rgba(0, 0, 0, .1);
 }

 .chat-input {
   resize: none;
   /* padding: 5px 10px; */
   height: 40px;
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
   background: #9cc900;
   background: -moz-linear-gradient(180deg, #00d8ff, #00b5d6);
   background: -webkit-linear-gradient(180deg, #00d8ff, #00b5d6);
   background: -o-linear-gradient(180deg, #00d8ff, #00b5d6);
   background: -ms-linear-gradient(180deg, #00d8ff, #00b5d6);
   background: linear-gradient(180deg, #00d8ff, #00b5d6);
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
   left: 20px;
   z-index: 100;
 }
 </style>
 <h1 id="name" style="display:none;"></h1>
   <h1 style="display: none;" id="log"></h1>
   <h1 style="display: none;" id="idnya"></h1>
<!-- <input type="text" placeholder="Email" id="username"> -->
<input type="text" hidden id="socketID">
<input type="text" hidden id="socketIDAdmin">

<!-- <button onclick="joined()" style="display:none;" id="submit">Submit</button> -->

<div class="chatbutton ">
  <a href="#" class="click-show">
    <span id="jmlhchat" style="position:absolute;top:-15px;right:-5px;font-size:12px;display:none;" class="translate-middle badge rounded-pill text-dark bg-info">
      0
    </span>
    <img src="https://cdn-icons-png.flaticon.com/512/1304/1304103.png"  alt="WhatsApp-Button">
  </a>
</div>

 <div id="displaychat" style="display:none;">
   <div class="chatbox-holder">
       <div class="chatbox">
         <div class="chatbox-top">
           <div class="chatbox-avatar">
             <a target="_blank" href=""><img src="https://www.cse.iitk.ac.in/users/sumitl/assets/images/40-512.png" /></a>
           </div>
           <div class="chat-partner-name">
             <!-- <span id="status" class="status donot-disturb"></span> -->
             <a target="_blank" href="">Chat Center</a>
           </div>
           <div class="chatbox-icons">
          <!--    <a href="javascript:void(0);"><i id="click" class="fa fa-minus"></i></a> -->
             <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
           </div>
         </div>
         <div class="container-fluid col-lg-12 " id="form_login">
           <input type="text" onchange="validation()" placeholder="Nama" class="form-control" style="margin-top:50px;" id="username">
           <br>
           <button onclick="joined()" class="btn btn-info float-left" id="submit">Submit</button>
          </div>

         <div class="chat-messages">
            <!-- <div class="message-box-holder">
             <div class="message-box">
               Hello Gaessss !!!
             </div>
           </div> -->
         </div>

         <div class="chat-input-holder" style="display:none;" id="form_chat">
           <textarea id="pesan" class="chat-input"></textarea>
           <input type="submit" value="Send" onclick="Submit_Pesan()" class="message-send" />
         </div>
       </div>
     </div>
   </div>
   <script src="widget/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js" ></script>
   <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <script src="widget/socket.io-client/socket.io.js"></script>
   <script type="text/javascript">

  $('.fa-minus').click(function(){
      $(this).closest('.chatbox');
      $("#displaychat").css("display","block");

    });

      $('.click-show').click(function(){
      $(this).closest('.chatbox');
      $('.click-show').css("display","none");
      $("#wa_class").css("display","none");
      $("#displaychat").css("display","block");
      });

      $('.fa-close').click(function(){
          $("#wa_class").css("display","block");
          $('.click-show').css("display","block");
      $("#displaychat").css("display","none");
      });

      var Status_admin = $("#status");
      var $messages = $('.messages');
      var $areapesan = $(".chat-messages");
      var $areabalas = $("#AreaBalas");
      var connectionOptions =  {
               "force new connection" : true,
               "reconnectionAttempts": "Infinity", //avoid having user reconnect manually in order to prevent dead clients after a server restart
               "timeout" : 10000, //before connect_error and connect_timeout are emitted.
               "transports" : ["websocket"]
           };
       var socket = io('https://chat.pertalis.com/',connectionOptions);



   function bukachat(ids){

     $('.min'+ids).click(function(){$(this).closest('.cht'+ids).toggleClass('chatbox-min');
     });
     $('.fa-close').click(function(){
       $(this).closest('.chatbox').hide();
     });
   }




   // joined();
   function joined (){
     var validasiHuruf = /^[a-zA-Z]+$/;
     var nama = $("#username").val();

     if(nama.indexOf("@")!=-1 && nama.indexOf(".")!=-1){
       // console.log("Nama Anda adalah " + nama.value);
       var username = $("#username").val();
       var rooms = "SN_001";
       // console.log(username);
       $("#form_login").css("display","none");
       $("#form_chat").css("display","flex");
       Login(username,rooms);
               }else{
                   alert("Masukan Format Email Dengan Benar");
               }
            }


  function Login(usernameLog,Rooms){
    socket.emit('create-session',{username:usernameLog , rooms : Rooms});

    socket.emit('get online users');
   socket.on('daftar user pertalis',function(value){
var usernameUser = $("#username").val();
for (let i = 0; i < value.length; i++) {
    var datax = value[i];
    if(datax.username == "admin" && datax.rooms == Rooms ){
    $("#socketIDAdmin").val(datax.idS);
  }else if(datax.username == usernameUser && datax.rooms == Rooms){
    getUnreadMessage(usernameUser,datax.idS)
    console.log(datax.idS+" "+datax.username);
  }

  }
});
socket.on('login',(datavalue) =>{
console.log(datavalue);

if (datavalue.rooms == roomsID) {
  getUsers(datavalue.users,datavalue.id,datavalue.rooms);
get_history(datavalue.users,datavalue.id,datavalue.rooms);
}
});

socket.on('user join', (datavalue) => {
console.log(datavalue);
});

socket.on('pesan',function(valmsg){

if (valmsg.rooms == roomsID) {
  NewPesan(valmsg.value,valmsg.username,valmsg.nameto);
}

})
socket.on('pesan_img',function(valmsg){
// console.log(valmsg.base64);
if (valmsg.rooms == roomsID) {
NewPesan_img(valmsg.base64,valmsg.username,valmsg.nameto,valmsg.caption);
}
})
socket.on('user left', (data) => {
  // console.log(data.username);
  log(data.username,data.id,data.username + ' left');
});
socket.on('disconnect', () => {
log('','','you have been disconnected');
});
  }

   function getUsers(username,idusers){
   $("#name").html(username);
   $("#socketID").val(idusers);
   }

   function log(username,iduser,status){
     $("#log").append("<ul>"+status+"</ul>");
   }


   const NewPesan = (value,username,nameto) => {

           var idS = $("#socketID").val();
           var usernamex =   $("#username").val();
           // console.log(username);
           // console.log(nameto);
           var nameTo = nameto.toLowerCase();
           var usernamexx = usernamex.toLowerCase();
           if(username == "admin" && nameTo == usernamexx){

               getUnreadMessage(usernamex,idS)
               $areapesan.append(
           ' <div class="message-box-holder">'+
           '<div class="message-sender">'+username+
            '</div>'+
            '<div class="message-box message-partner">'+
               value +
           '</div></div>'
       );
         bunyi();
     }else if(usernamex == "admin"){

             $areapesan.append(
               '<div class="message-box-holder">'+
               '<div class="message-sender"> <i class="fa fa-reply" onclick="reply(\''+username+'\',\''+value+'\')"></i>  '+ username +
               '</div>'+
               '<div class="message-box message-partner">'+
               value +
               '</div>'+
               '</div>'
             );
               }else if(nameto == usernamex){

           $areapesan.append(
             '<div class="message-box-holder">'+
             '<div class="message-sender">'+ username +
             '</div>'+
             '<div class="message-box message-partner">'+
             value +
             '</div>'+
             '</div>'
           );

             }

         }


         const NewPesan_img = (base64,username,nameto,caption) => {

           var usernamex =     $("#username").val();
           var idS = $("#socketID").val();
           getUnreadMessage(usernamex,idS)

     if(username == "admin" && nameto == usernamex){
     bunyi();
         $areapesan.append(
     '  <div class="message-box-holder">'+
     '<div class="message-sender">'+username+
      '</div>'+
      '<div class="message-box message-partner">'+
       '<p><img style="width:100%;" onclick="zoomin(this.id);zoomout(this.id);return false;" id="'+base64+'" src="'+base64+'"><p>' +
       '<p>'+caption+'</p>'+
     '</div></div>'
   ); }else if(usernamex == "admin"){

       $areapesan.append(
         '<div class="message-box-holder">'+
         '<div class="message-sender"> <i class="fa fa-reply" onclick="reply(\''+username+'\',\''+value+'\')"></i>  '+ username +
         '</div>'+
         '<div class="message-box message-partner">'+
         value +
         '</div>'+
         '</div>'
       );
         }else if(username == usernamex){

     $areapesan.append(
       '<div class="message-box-holder">'+
       '<div class="message-sender">'+ username +
       '</div>'+
       '<div class="message-box message-partner">'+
         '<p><img src="'+base64+'"><p>' +
           '<p>'+caption+'</p>'+
       '</div>'+
       '</div>'
     );
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


        const NewAdmin = (value,username) => {
       $areabalas.append(
           '  <div class="message-box-holder">'+
           '<div class="message-box">' +
               value +
           '</div></div>'
       )

         }



   const Submit_Pesan = () => {
            var isipesan = $("#pesan").val();
            var idS = $("#socketID").val();
            var idAdmin = $("#socketIDAdmin").val();
            if (idAdmin == "") {
              alert("Admin Belum Ready ");
              return false;
            }
            socket.emit('message',isipesan,idAdmin,roomsID);
            $areapesan.append(
           '<div class="message-box-holder">'+
           '<div class="message-box">'+
             isipesan+
           '</div>'+
         '</div>'
     );

  $("#pesan").val("");



        }



     function getUnreadMessage(username,idsocket) {
       var url = "https://pertalis.com/chat_apps/Admin/api/get_unreadmessageuser.php?username="+username+"&id="+idsocket;
       $.getJSON(url, function(data) {
        $.each(data.result, function() {
          $("#jmlhchat").html(this['jumlah']);
        });
      });

     }

     function get_history(username,idS){
     var url = "https://pertalis.com/chat_apps/Admin/api/get_history.php?username="+username+"&id="+idS+"&rooms="+roomsID;
     console.log(url);
     $.getJSON(url,function(data){
     $.each(data.result,function(){
   if (this['username_send'] == "admin") {
     if (this['type'] == "text") {
       $areapesan.append(
           '  <div class="message-box-holder">'+
           '<div class="message-sender"> Admin'+
            '</div>'+
            '<div class="message-box message-partner">'+
               this['value'] +
           '</div></div>'
       );
     }else{
       $areapesan.append(
     '  <div class="message-box-holder">'+
     '<div class="message-sender"> Admin'+
      '</div>'+
      '<div class="message-box message-partner">'+
       '<p><img  style="width:100%;" src="'+this['value']+'"><p>' +
       '<p>'+this['caption']+'</p>'+
     '</div></div>'
   );
     }


   }else{
     if(this['type']=="text"){
       $areapesan.append(
           '<div class="message-box-holder">'+
           '<div class="message-box">'+
             this['value']+
           '</div>'+
         '</div>'
     );
     }else{
       $areapesan.append(
           '<div class="message-box-holder">'+
           '<div class="message-box">'+
             '<p><img style="width:100%;" src="'+this['value']+'"><p>' +
             '<p>'+this['caption']+'</p>'+
           '</div>'+
         '</div>'
     );
     }
   }

   });
     }).done(function( json ) {
         }) .fail(function( jqxhr, textStatus, error ) {
           alert("Error","Segera Periksa Internet Anda !",'error');
       });


   }

   function validation(){
     var validasiHuruf = /^[a-zA-Z]+$/;
     var nama = document.getElementById("username");
     if (nama.value.match(validasiHuruf)) {
        console.log("Nama Anda adalah " + nama.value);
     } else {
        alert("Masukkan nama Anda !\nFormat wajib huruf !\nTidak Perlu Menggunakan SPASI !");
        nama.value="";
        nama.focus();
        return false;
     }
   }

     function bunyi() {
   var bel = new Audio('widget/ringtone.mp3');
   bel.play();
   }

   </script>
