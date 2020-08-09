@extends('template2.app')

@section('content')
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: center;
  overflow: hidden;
  width: 60%; border-right:1px solid #c4c4c4;
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
<section id="content">
        <div class="container">

<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
         
        <div class="inbox_chat" id="inbox_chat">
            
        
            <a href="">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            </a>

            


          </div>

          
          
          

        </div>
       

        </div>
      </div>
      
      
    </div>
    </div>
            <!--end container-->


            <script>

    $(document).ready(function() {
        // var url = "{{URL('userData')}}";
        retrieve_data();
        
        // setTimeout(retrieve_data(), 100);
        

     setInterval(retrieve_data, 10000);
     

    });

    function retrieve_data() {
        $.ajax({
            url: "/admin-perum/chats-list-admin",
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
                  var url = "{{url('admin-perum/chat-detail')}}" 
                    var chatUrl = url+'/'+row.id_user;
                    var tanggal = new Date(row.created_at);
                    let formatted_date = tanggal.getDate() + "-" + (tanggal.getMonth()) + "-" + tanggal.getFullYear() + " | " + tanggal.getHours() + ":" + tanggal.getMinutes();
                    bodyData += '<a href="'+chatUrl+'"> <div class="chat_list"> <div class="chat_people">'
                    bodyData += '<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>'
                    bodyData +='<div class="chat_ib">'
                    bodyData += '<h5>'+row.user.nama+'<span class="chat_date">'+formatted_date+'</span></h5>'
                    bodyData += '<p>'+row.isi_chat+'</p>'
                    bodyData += '</div></div></div></a>';
                    
                    
                    
                })
                // $("#messages_box").append(bodyData);
                document.getElementById("inbox_chat").innerHTML = bodyData; 
                // console.log("fuck");
              
            }

        });
        // return aj;
        }
</script>
@endsection