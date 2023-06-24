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
    var socket = io('http://116.197.135.158:8101',connectionOptions);



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

if (rooms == roomsID) {
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
    var url = "http://116.197.135.158:11801/chat_admin/Admin/api/get_unreadmessageuser.php?username="+username+"&id="+idsocket;
    $.getJSON(url, function(data) {
     $.each(data.result, function() {
       $("#jmlhchat").html(this['jumlah']);
     });
   });

  }

  function get_history(username,idS){
  var url = "http://116.197.135.158:11801/chat_admin/Admin/api/get_history.php?username="+username+"&id="+idS+"&rooms="+roomsID;
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
var bel = new Audio('https://github.com/indriyani13/chat/blob/main/ringtone.mp3');
bel.play();
}
