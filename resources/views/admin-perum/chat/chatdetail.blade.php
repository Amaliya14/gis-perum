@extends('template2.app')

@section('content')
<style>
.container{max-width:1000px; margin:auto;}
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
  width: 80%;
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
                  @if(empty($chat->user))
                  <h5>{{$chat->user}} <span class="chat_date">{{date('d, M Y', strtotime($chat->created_at))}}</span></h5>
                  <p>''</p>
                  @else
                  <h5>{{$chat->user->nama}} <span class="chat_date">{{date('d, M Y', strtotime($chat->created_at))}}</span></h5>
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


            <script>

$(document).ready(function() {
    // var url = "{{URL('userData')}}";
    retrieve_data();
    
    // setTimeout(retrieve_data(), 100);
    

 setInterval(retrieve_data, 10000);
 $('#kirim').click(function(){
   var isi = $('#isi_chat').val();
   var id_user = {{$id_user}};
   var id_admin = {{ Auth::user()->id }};
   var pengirim = 'admin';
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
    var id_user = {{$id_user}};
    var id_admin = {{ Auth::user()->id }} || 1;
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
                if (row.pengirim == 'admin') {
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
@endsection