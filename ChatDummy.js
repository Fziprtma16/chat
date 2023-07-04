var variable = "" +
"<div id=\"popup\" class=\"popup\">" +
"  <div class=\"popup-content\">" +
"    <div style=\"align-items: flex-end;\">" +
"   <!--    <a href=\"javascript:void(0);\"><i id=\"click\" class=\"fa fa-minus\"></i></a> -->" +
"    </div>" +
"    <h3>Kirim Gambar</h3>" +
"    <br>" +
"    <canvas style=\"width:350px;height:300px\" id=\"our-canvas\" class=\"image-container\"></canvas>" +
"    <input type=\"text\" hidden  id=\"Base64IMG\">" +
"    <input type=\"text\" placeholder=\"Caption\" class=\"form-control\" style=\"margin-top:50px;\" id=\"caption_img\">" +
"    <br>" +
"    <button type=\"button\" onclick=\"send_img()\" class=\"btn btn-primary\">Send</button>" +
"    <button type=\"button\" onclick=\"closePopup()\" class=\"btn btn-danger mr-3\">Cancel</button>" +
"  </div>" +
"</div>" +
"" +
"" +
"" +
" <h1 id=\"name\" style=\"display:none;\"></h1>" +
"   <h1 style=\"display: none;\" id=\"log\"></h1>" +
"   <h1 style=\"display: none;\" id=\"idnya\"></h1>" +
" <!-- <input type=\"text\" placeholder=\"Email\" id=\"username\"> -->" +
" <input type=\"text\" hidden id=\"socketID\">" +
" <input type=\"text\" hidden id=\"socketIDAdmin\">" +
"" +
" <!-- <button onclick=\"joined()\" style=\"display:none;\" id=\"submit\">Submit</button> -->" +
"" +
" <div class=\"chatbutton \">" +
"  <a href=\"javascript:void(0);\" class=\"click-show\">" +
"    <span id=\"jmlhchat\" style=\"position:absolute;top:-15px;right:-5px;font-size:12px;display:none;\" class=\"translate-middle badge rounded-pill text-dark bg-info\">" +
"      0" +
"    </span>" +
"    <img src=\"widget/live-chat.png\" id=\"gambar_widget\" style=\"width:80px;\"  alt=\"Chat-Button\">" +
"  </a>" +
" </div>" +
"" +
" <div id=\"displaychat\" style=\"display:none;\">" +
"   <div class=\"chatbox-holder\">" +
"       <div class=\"chatbox\" id=\"chatbbox\">" +
"         <div class=\"chatbox-top\">" +
"           <div class=\"chatbox-avatar\">" +
"             <a target=\"_blank\" href=\"\"><img id=\"icon_admin\" src=\"https://cdn-icons-png.flaticon.com/128/2543/2543339.png\" /></a>" +
"           </div>" +
"           <div class=\"chat-partner-name\">" +
"             <!-- <span id=\"status\" class=\"status donot-disturb\"></span> -->" +
"             <a target=\"_blank\" id=\"nama_admin\" href=\"\">Live Chat</a>" +
"           </div>" +
"           <div class=\"chatbox-icons\">" +
"          <!--    <a href=\"javascript:void(0);\"><i id=\"click\" class=\"fa fa-minus\"></i></a> -->" +
"             <a href=\"javascript:void(0);\"><i class=\"fa fa-close\"></i></a>" +
"           </div>" +
"         </div>" +
"         <div class=\"container-fluid col-lg-12 p-4\" id=\"form_layanan\">" +
"           <h3>Hallo ... 👋</h3>" +
"           <div class=\"list-group\"  id=\"groupLayanan\">" +
"           </div>" +
" <br>" +
" <button class=\"btn btn-info text-white\" onclick=\"MenghubugkanAdmin()\">Hubungkan Saya Ke Admin</button>" +
"          </div>" +
"         <div class=\"container-fluid col-lg-12 \" style=\"display:none;\" id=\"form_login\">" +
"           <input type=\"text\" placeholder=\"Email\" class=\"form-control\" style=\"margin-top:50px;\" id=\"username\">" +
"           <br>" +
"" +
"           <button onclick=\"joined()\" class=\"btn btn-info float-left text-white\" id=\"submit\">Submit</button>" +
"          </div>" +
"" +
"         <div class=\"chat-messages\" id=\"chhhtt\">" +
"            <!-- <div class=\"message-box-holder\">" +
"             <div class=\"message-box\">" +
"               Hello Gaessss !!!" +
"             </div>" +
"           </div> -->" +
"         </div>" +
"" +
"         <div class=\"chat-input-holder\" style=\"display:none;\" id=\"form_chat\">" +
"           <textarea id=\"pesan\" placeholder=\"Write Your Message\" class=\"chat-input\"></textarea>" +
"           <div class=\"file_img\">" +
"             <i class=\"fa fa-image fa-xl\" onclick=\"openFILE()\"></i>" +
"           </div>" +
"           <input id=\"fileid\" onchange=\"return validasiEkstensi() \" type=\"file\" hidden/>" +
"" +
"           <button type=\"submit\"  onclick=\"Submit_Pesan()\" class=\"message-send\" >" +
"           <img src=\"https://cdn-icons-png.flaticon.com/128/9131/9131510.png\" style=\"width:20px;margin-bottom: 20px;color:blue;\" alt=\"\">" +
"         </button>" +
"" +
"         </div>" +
"               <small>&copy; 2023 Powered By CrashTeam.</small>" +
"       </div>" +
"     </div>" +
"   </div>" +
"" +
"";
var body = document.getElementsByTagName('body')[0]; // Mendapatkan referensi elemen body
// Menambahkan elemen baru ke dalam body
body.innerHTML = variable;
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
  "reconnectionAttempts": "Infinity",
  "timeout": 10000,
  "transports": ["websocket"]
};
var socket = io('https://chat.pertalis.com/',connectionOptions);

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
     }else{
       $("#gambar_widget").attr("src","https://sofwareshop.com/appstore/widget_enc/live-chat.png");
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
       }else{
         $("#icon_admin").attr("src","https://www.cse.iitk.ac.in/users/sumitl/assets/images/40-512.png");
       }
       if (obj.nama_widget != "") {
         $("#nama_admin").text(obj.nama_widget);
       }else{
           $("#nama_admin").text("Live Chat");
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
    var username = $("#username").val();
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
      }
    }
  });
  socket.on('login', (datavalue) => {
    if (datavalue.rooms == roomsID) {
      getUsers(datavalue.users, datavalue.id, datavalue.rooms);
      get_history(datavalue.users, datavalue.id, datavalue.rooms);
    }
  });
  socket.on('user join', (datavalue) => {
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
    if (valmsg.rooms == roomsID) {
      $('.click-show').css("display", "none");
      $("#wa_class").css("display", "none");
      $("#displaychat").css("display", "block");
      NewPesan_img(valmsg.base64, valmsg.username, valmsg.nameto, valmsg.caption);
    }
  })
  socket.on('user_pergi', (data) => {
    log(data.username, data.id, data.username + ' left');
  });

}

socket.on('disconnect', () => {
  console.log('ERROR');
});

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
  var nameTo = nameto.toLowerCase();
  var usernamexx = usernamex.toLowerCase();
  var sekarang = new Date();
  var tahun = sekarang.getFullYear();
  var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
  var tanggal = sekarang.getDate();
  var jam = sekarang.getHours();
  var menit = sekarang.getMinutes();
  var detik = sekarang.getSeconds();
  var formatWaktu = tahun + '-' + bulan + '-' + tanggal + ' ' + jam + ':' + menit + ':' + detik;
  if (username == "admin" && nameTo == usernamexx) {
    bunyi()
    getUnreadMessage(usernamex, idS)
    $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div style="margin-bottom:15px;">' + formatWaktu + '</div>' + '<div class="message-box message-partner">' + value + '</div>' + '</div>');
  }

}
const NewPesan_img = (base64, username, nameto, caption) => {
  var usernamex = $("#username").val();
  var idS = $("#socketID").val();
  var sekarang = new Date();
  var tahun = sekarang.getFullYear();
  var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
  var tanggal = sekarang.getDate();
  var jam = sekarang.getHours();
  var menit = sekarang.getMinutes();
  var detik = sekarang.getSeconds();
  var formatWaktu = tahun + '-' + bulan + '-' + tanggal + ' ' + jam + ':' + menit + ':' + detik;
  getUnreadMessage(usernamex, idS)
  if (username == "admin" && nameto == usernamex) {
    bunyi();
    $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + formatWaktu + '</div>' + '<div class="message-box message-partner">' + '<p><img style="width:100%;" onclick="zoomin(this.id);zoomout(this.id);return false;" id="' + base64 + '" src="' + base64 + '"><p>' + '<p>' + caption + '</p>' + '</div>' + '</div>');
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
    event.preventDefault();
    var x = event.clientX;
    var y = event.clientY;
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
  var sekarang = new Date();
  var tahun = sekarang.getFullYear();
  var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
  var jam = sekarang.getHours();
  var menit = sekarang.getMinutes();
  var detik = sekarang.getSeconds();
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
  $.getJSON(url, function(data) {
    $areapesan.empty();
    $.each(data.result, function() {
      if (this['username_send'] == "admin") {
        if (this['type'] == "text") {
          $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box message-partner">' + this['value'] + '</div>' + '</div>');
        }
        else {
          $areapesan.append('  <div class="message-box-holder">' + '<div  class="message-sender">' + '<img style="float:left;" class="avatar_img_admin" src="https://cdn-icons-png.flaticon.com/128/2343/2343177.png">' + '<div  style="display:block;width:350px;">' + '<span class="span_avatar">Admin</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box message-partner">' + '<p><img  id="' + this['value'] + '" style="width:100%;border-radius:20px;" src="' + this['value'] + '"><p class = "text-white">' + '<p>' + this['caption'] + '</p>' + '</div>' + '</div>');
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
          $areapesan.append('<div class="message-box-holder">' + '<div   class="message-receive">' + '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' + '<div style="display:block;width:185px;">' + '<span  class="span_avatar">' + this['username_send'] + '</span>' + '</div>' + this['time'] + '</div>' + '<div class="message-box">' + '<p><img id="' + this['value'] + '" style="width:100%;" src="' + this['value'] + '"><p>' + '<p class = "text-white">' + this['caption'] + '</p>' + '</div>' + '</div>');
        }
      }
    });
  }).done(function(json) {
    $(".chat-messages").LoadingOverlay("hide");
  }).fail(function(jqxhr, textStatus, error) {
    alert("Error", "Segera Periksa Internet Anda !", 'error');
  });
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

function openFILE() {
  document.getElementById('fileid').click();
}

function ChangeForm() {
  const docs = $('#fileid').prop('files')[0];
  var base64 = getBase64(docs);
  handleFile(docs);
  openPopup();
}

function getBase64(file) {
  var reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function() {
    $("#Base64IMG").val(reader.result);
  };
  reader.onerror = function(error) {
    console.log('Error: ', error);
  };
}

function uploadFile(idS) {
  $('#uploadfile').bind('change', function(e) {
    var data = e.originalEvent.target.files[0];
    readThenSendFile(data, idS);
  });
}

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

}

function openPopup() {
  var popup = document.getElementById('popup');
  popup.classList.add('show');
  $("#wa_class").css("display", "block");
  $('.click-show').css("display", "block");
  $("#displaychat").css("display", "none");
}

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
  $areapesan.append('<div class="message-box-holder">' + '<div   class="message-receive">' + '<img style="float:right;" class="avatar_img" src="https://cdn-icons-png.flaticon.com/128/4333/4333609.png">' + '<div style="display:block;width:185px;">' + '<span  class="span_avatar">' + username + '</span>' + '</div>' + dateTime + '</div>' + '<div class="message-box">' + '<p><img style="width:100%;" src="' + base64 + '"><p>' + '<p class = "text-white">' + caption + '</p>' + '</div>' + '</div>');
  $("#Base64IMG").val('');
  $("#caption_img").val('');
  closePopup();
}

function bunyi() {
  var bel = new Audio('widget/smile.ogg');
  bel.play();
}
