<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">

    <!--CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

    <title>Gis-Perum</title>
    <style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
</head>

<body>

<!-- WRAPPER
    =================================================================================================================-->
<div class="ts-page-wrapper ts-has-bokeh-bg" id="page-top">

    <!--*********************************************************************************************************-->
    <!--HEADER **************************************************************************************************-->
    <!--*********************************************************************************************************-->
    <header id="ts-header" class="fixed-top">
      <nav id="ts-secondary-navigation" class="navbar" style="margin-bottom: -20px">
            <div class="container justify-content-center mt-3">
              <h2 class="text-dark">Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</h2>
            </div>
        </nav>
        <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-dark">
            <div class="container">

                <!--Brand Logo-->
                <a class="navbar-brand" href="index-map-leaflet-fullscreen.html">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Shield_of_the_city_of_Tegal.svg" width="30px" height="40px" alt="">
                </a>

                <!--Responsive Collapse Button-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--Collapsing Navigation-->
                <div class="collapse navbar-collapse" id="navbarPrimary">

                    <!--LEFT NAVIGATION MAIN LEVEL
                    =================================================================================================-->
                    <ul class="navbar-nav">

                        <!--HOME (Main level)
                        =============================================================================================-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/map')}}">
                                Peta
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Info Perumahan
                            </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url('/perumahan')}}">Perumahan</a>
                                    <a class="dropdown-item" href="{{url('/data-pengembang')}}">Data Pengembang</a>
                                </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/kontak')}}">
                                Contact 
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav ml-auto">
                    
                        @auth('pengguna')
                        <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                           {{ Auth::user()->nama }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('users.logout')}}">Logout</a>
                                </div>
</li>
                        @endauth

                        @guest('pengguna')
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#modalLoginForm">
                                Login
                            </a>
                           
                            </li>
                        @endguest
                        
                    </ul>
                </div>
                <!--end navbar-collapse-->
            </div>
            <!--end container-->
        </nav>
        <!--end #ts-primary-navigation.navbar-->

    </header>
    <!--end Header-->

    <!--*********************************************************************************************************-->
    <!-- MAIN ***************************************************************************************************-->
    <!--*********************************************************************************************************-->

    <main id="ts-main">

        <!--PAGE TITLE
            =========================================================================================================-->
      

        <!--CONTENT
            =========================================================================================================-->
        <section id="content">
        <div class="container">

<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
         
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  @if(empty($chat->pengembang))
                  <h5>{{$chat->nama}} <span class="chat_date">{{date('d, M Y', strtotime($chat->created_at))}}</span></h5>
                  <p>''</p>
                  @else
                  <h5>{{$chat->pengembang->nama}} <span class="chat_date">{{date('d, M Y', strtotime($chat->created_at))}}</span></h5>
                  <p>{{$chat->isi_chat}}</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history" id="messages_box">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>

          </div>
          
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" id = "isi_chat" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" id = "kirim" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
          </div>

        </div>
      </div>
      
      
    </div>
    </div>
            <!--end container-->
        </section>


    </main>
    <!--end #ts-main-->


    @include('modal');
    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

    <footer id="ts-footer">

        <!--MAIN FOOTER CONTENT
            =========================================================================================================-->
        <section id="ts-footer-main">
            <div class="container">
                <div class="row">

                    <!--Brand and description-->
                    <div class="col-md-6">
                        <a href="#" class="brand">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>

                   <!--Navigation-->
                    <div class="col-md-2">
                        <h4>Navigation</h4>
                        <nav class="nav flex-row flex-md-column mb-4">
                            <a href="{{url('/')}}" class="nav-link">Home</a>
                            <a href="{{url('/map')}}" class="nav-link">Peta</a>
                            <a href="{{url('/perumahan')}}" class="nav-link">Perumahan</a>
                            <a href="{{url('/data-pengembang')}}" class="nav-link">Data Pengembang</a>
                            <a href="{{url('/kontak')}}" class="nav-link">Contact Us</a>
                        </nav>
                    </div>

                    <!--Contact Info-->
                    <div class="col-md-4">
                        <h4>Contact Us</h4>
                        <address class="ts-text-color-light">
                            Dinas Perumahan Dan Kawasan Pemukiman Kota Tegal
                            <br>
                            Jl. Ki Gede Sebayu No.11 Tegal
                            <br>
                            <strong>Email: </strong>
                            <a href="#" class="btn-link">diskimtaru@tegalkota.go.id</a>
                            <br>
                            <strong>Phone:</strong>
                            +62283 358165
                            <br>
                            <strong>Website: </strong>
                            disperkim.tegalkota.go.id 
                        </address>
                    </div>

                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-main-->

        <!--SECONDARY FOOTER CONTENT
            =========================================================================================================-->
        <section id="ts-footer-secondary">
            <div class="container">

                <!--Copyright-->
                <div class="ts-copyright"> 2020 Sistem Informasi Geografis Pemetaan Perumahan Di Kota Tegal</div>

                <!--Social Icons-->
                
                <!--end ts-footer-nav-->

            </div>
            <!--end container-->
        </section>
        <!--end ts-footer-secondary-->

    </footer>
    <!--end #ts-footer-->

</div>
<!--end page-->


<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script>

    $(document).ready(function() {
        // var url = "{{URL('userData')}}";
        retrieve_data();
        
        // setTimeout(retrieve_data(), 100);
        

     setInterval(retrieve_data, 10000);
     $('#kirim').click(function(){
       var isi = $('#isi_chat').val();
       var id_admin = {{$id_admin}};
       var id_user = {{ Auth::user()->id }};
       var pengirim = 'user';
       $.ajax({

type:'POST',

url:'/api/chats',

data:{isi_chat:isi,id_user:id_user,id_admin:id_admin,pengirim:pengirim},
headers: {

'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

},
success:function(data){
    $('#isi_chat').val("");
   retrieve_data();

},
error : function(data){
    alert(data);
} 

});

});

    });

    function retrieve_data() {
        var id_admin = {{$id_admin}};
        var id_user = {{ Auth::user()->id }} || 1;
        $.ajax({
            url: "/api/chats?id_user="+id_user+"&id_admin="+id_admin,
            type: "get",
            // data:{ 
            //     _token:'{{ csrf_token() }}'
            // },
            cache: false,
            // dataType: 'json',
            success: function(dataResult){
                console.log(dataResult.data);
                // var dataChat = dataResult.data
                // dataChat.map(chat=>{
                //     console.log(chat);
                // })

                var resultData = dataResult.data;
                var bodyData = '';
                // var i=1;
                $.each(resultData,function(index,row){
                    // var editUrl = url+'/'+row.id+"/edit";
                    var tanggal = new Date(row.created_at);
                    let formatted_date = tanggal.getDate() + "-" + (tanggal.getMonth() + 1) + "-" + tanggal.getFullYear() + " | " + tanggal.getHours() + ":" + tanggal.getMinutes();
                    var pengirim;
                    if (row.pengirim == 'user') {
                        pengirim = 'incoming_message';
                        bodyData +="<div class='outgoing_msg'><div class='sent_msg'> <p>"+row.isi_chat+"</p><span class='time_date'>"+formatted_date+"</span> </div></div>"
                    }else{
                    bodyData+="<div class='incoming_msg'>"
                    bodyData+="<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>"
                    bodyData+="<div class='received_msg'>"
                    bodyData+="<div class='received_withd_msg'>"
                    bodyData+="<p>"+row.isi_chat+"</p>"
                    bodyData+="<span class='time_date'>" + formatted_date +"</span></div>";
                    bodyData+="</div></div>";
                    }
                    
                    
                })
                // $("#messages_box").append(bodyData);
                document.getElementById("messages_box").innerHTML = bodyData; 
                // console.log("fuck");
              
            }

        });
        // return aj;
        }
</script>


</body>
</html>
