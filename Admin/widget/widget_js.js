

$('.fa-minus').click(function(){    $(this).closest('.chatbox');
        $("#displaychat").css("display","block");
      });

       $('.click-show').click(function(){
           $(this).closest('.chatbox');
        $("#displaychat").css("display","block");
      });

      $('.fa-close').click(function(){
        // $(this).closest('.chatbox').hide();
           // $(this).css("display","none");
          $("#displaychat").css("display","none");
      });




    var Status_admin = $("#status");
           var $messages = $('.messages');
           var $areapesan = $(".chat-messages");
           var $areabalas = $("#AreaBalas");
    // var socket = io('http://localhost:3000');
    var connectionOptions =  {
            "force new connection" : true,
            "reconnectionAttempts": "Infinity", //avoid having user reconnect manually in order to prevent dead clients after a server restart
            "timeout" : 10000, //before connect_error and connect_timeout are emitted.
            "transports" : ["websocket"]
        };
    var socket = io('https://chat.pertamalab.com/',connectionOptions);



function bukachat(ids){

  $('.min'+ids).click(function(){$(this).closest('.cht'+ids).toggleClass('chatbox-min');
  });
  $('.fa-close').click(function(){
    $(this).closest('.chatbox').hide();
  });
}




// joined();
function joined (){
          var username = $("#username").val();
          console.log(username);
          $("#form_login").css("display","none");
          socket.emit('create-session',username);
       }

function getUsers(username,idusers){
$("#name").html(username);
$("#socketID").val(idusers);
// console.log(username+'  '+idusers);
}

function log(username,iduser,status){
  $("#log").append("<ul>"+status+"</ul>");
}


const NewPesan = (value,username,nameto) => {

        var idS = $("#socketID").val();
        var usernamex =   $("#username").val();
        if(username == "admin" && nameto == usernamex){

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
    '<p><img style="width:100%;" onclick="zoomin(this.id)" id="'+base64+'" src="'+base64+'"><p>' +
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
          var currWidth = GFG.clientWidth;
          GFG.style.width = (currWidth - 100) + "px";
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
         socket.emit('message',isipesan,idAdmin);
         $areapesan.append(
        '<div class="message-box-holder">'+
        '<div class="message-box">'+
          isipesan+
        '</div>'+
      '</div>'
  );





     }

      socket.emit('get online users');

     socket.on('daftar user pertalis',function(value){
  var usernameUser = $("#username").val();
for (let i = 0; i < value.length; i++) {
      var datax = value[i];
      if(datax.username == "admin"){
      $("#socketIDAdmin").val(datax.idS);
    }else if(datax.username == usernameUser){
      getUnreadMessage(usernameUser,datax.idS)
      console.log(datax.idS+" "+datax.username);
    }

    }
  });



socket.on('login',(datavalue) =>{
  console.log(datavalue);
  getUsers(datavalue.users,datavalue.id);
  get_history(datavalue.users,datavalue.id);
  });

socket.on('user join', (datavalue) => {
console.log(datavalue);
});


socket.on('pesan',function(valmsg){
  console.log(valmsg.value);
  console.log(valmsg.id);
  console.log(valmsg.from);
  console.log(valmsg.username);
//   AddValue(valmsg.value,valmsg.username);
  NewPesan(valmsg.value,valmsg.username,valmsg.nameto);

})

socket.on('pesan_img',function(valmsg){
// console.log(valmsg.base64);
  NewPesan_img(valmsg.base64,valmsg.username,valmsg.nameto,valmsg.caption);
})




socket.on('user left', (data) => {
    // console.log(data.username);
    log(data.username,data.id,data.username + ' left');
  });


  socket.on('disconnect', () => {
  log('','','you have been disconnected');
  });


  function getUnreadMessage(username,idsocket) {
    var url = "https://pertamalab.com/adminchat/api/get_unreadmessageuser.php?username="+username+"&id="+idsocket;
    $.getJSON(url, function(data) {
     $.each(data.result, function() {
       $("#jmlhchat").html(this['jumlah']);
     });
   });

  }

  function get_history(username,idS){
  var url = "https://pertamalab.com/adminchat/api/get_history.php?username="+username+"&id="+idS;
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
    '<p><img style="width:100%;" src="'+this['value']+'"><p>' +
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


  function bunyi() {
var bel = new Audio('widget/ringtone.mp3');
bel.play();
}
