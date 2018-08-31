$(document).ready(function(){
	
$('#myTab').tab();


	
$(document).on('click', '#usersListWrapper li', function(){
     $('#usersListWrapper li').each( function(i,e) {
		$(this).removeClass('activeUser'); 
	 });
	 $(this).removeClass().addClass('activeUser');    
});




/*----------------------------------------------------------------------
| logout function
------------------------------------------------------------------------*/
$(document).on('click', '#logout', function(){
        $.ajax({
            type: "POST",
            url: base  + "users/logout",//localhost/codeigniter/index.php/users/logout
            cache: false,
            beforeSend: function(){},
            success: function(response){  
				window.location = 'users';
			}
        });
    return false;
});


 
 
 /*----------------------------------------------------------------------
| Function to display individual chatbox
------------------------------------------------------------------------*/

$(document).on('click', '[data-toggle="popover"]', function(){
        $(this).popover('hide');
        $('ul.chat-box-body').empty();
        user = $(this).find('input[name="user_id"]').val();
        $(this).find('span[rel="'+user+'"]').text('');

        load_thread(user);

        var offset = $(this).offset(); 
        var h_main = $('#chat-container').height();
        var h_title = $("#chat-box > .chat-box-header").height();
        var top = ($('#chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
        if((top + $('#chat-box').height()) > h_main){ top = h_main -  $('#chat-box').height();}
        $('#chat-box').css({'top': 'auto'});
		 $('#chat-box').css({'display': 'block'});
        /*if(!$('#chat-box').is(':visible')){
            $('#chat-box').toggle('slide',{
                direction: 'right'
            }, 500);
        }*/
        $('.chat-box-body').slimScroll({ height: '300px' });
        // FOCUS INPUT TExT WHEN CLICK
        $("#chat-box .chat-textarea input").focus();
});





/*----------------------------------------------------------------------
| change status Function
------------------------------------------------------------------------*/
$(document).on('click', '.btnStatus', function() {
    //$(this).find('.btn').toggleClass('active');  
    //if ($(this).find('.btn-success').size()>0) {
     //$(this).toggleClass('btn-success');
		var chatStat = $(this).attr('id');
		var stt = 0;
		if(chatStat == 'online'){
             $(this).removeClass('btn-default').addClass('btn-success');
			 $('.status-btn-group button#offline').removeClass('btn-success').addClass('btn-default');
			 stt = 1;
        }            
        if(chatStat == 'offline'){
             $(this).removeClass('btn-default').addClass('btn-success');
			 $('.status-btn-group button#online').removeClass('btn-success').addClass('btn-default');
			 stt = 0;
        } 
		
 		$.ajax({ 
			type: "POST", 
			url: base  + "chat/change_status", 
			data: {status : stt},
			cache: false,		
             success: function(response){
                if(response.status == 1){
                    $('#current_status').html('Online');
                    $('#current_status').removeClass('btn-danger').addClass('btn-success');
                }            
                else{
                    $('#current_status').html('Offline');
                    $('#current_status').removeClass('btn-success').addClass('btn-danger');
                }
        }});
   // }    
     //$(this).toggleClass('btn-default');
});


	
/*----------------------------------------------------------------------
| minimize the chat box window
------------------------------------------------------------------------*/
	
$(document).on('click','.chat-box-header', function(){
     $('.chat-container').toggle();
 });


/*----------------------------------------------------------------------
| Close the chat box window
------------------------------------------------------------------------*/
$(document).on('click','a.chat-box-close', function(){
    $('.chat-box').hide();
});

 
/*----------------------------------------------------------------------
| Close the chat container
------------------------------------------------------------------------*/
$(document).on('click', '.chat-form-close', function(){
    $('#chat-container').toggle('slide', {
        direction: 'right'
    }, 500);
    //$('.chat-box').hide();
});




/*----------------------------------------------------------------------
| Display the chat container
------------------------------------------------------------------------*/
$('.btn-chat').click(function () {
    if($('.chat-box').is(':visible')){
        $('#chat-container').toggle('slide', {
            direction: 'right'
        }, 500);
        $('.chat-box').hide();
    } else{
        $('#chat-container').toggle('slide', {
            direction: 'right'
        }, 500);
        chat_init();
    }
});
 
 
 	
$('a#delete_messages') .click(function () {
	$('input.checkbx, #deletemsgbtns').show();
 });

$('input#DeleteMsgBtn') .click(function () {
	if( $('input.checkbx:checkbox:checked').length > 0 ){
		
		var r=confirm("Are you sure you want to delete?");
		 if(r==true)		
		 {
				
		var userID = $('#Msg_chat_buddy_id').val();
		
		var deleMsgStr = '';
		$('input.checkbx:checkbox:checked').each(function() {
            deleMsgStr += $(this).val()+',';
        });
		
		
		$.ajax({ 
			type: "POST", 
			url: base  + "chat/delete_messages", 
			data: {message: deleMsgStr},
			cache: false,
                success: function(response){
                    msg = response.message;
					if(msg==1) {
						load_message_section(userID);
						$('input.checkbx, #deletemsgbtns').hide();
					}
                     
                }
            });
			
		 }
		
	} //else { alert('Please select a message to delete'); }
	
});	



$('input#CancelMsgBtn') .click(function () {
	$('input.checkbx, #deletemsgbtns').hide();
	
});	



});



shChatM();

$(document).on('keypress', '.chat-textarea input', function(e){
        var txtarea = $(this);
        var message = txtarea.val();
        if(message !== "" && e.which == 13){
            txtarea.val('');
            // save the message 
            $.ajax({ type: "POST", url: base  + "chat/send_message", data: {message: message, user : user},cache: false,
                success: function(response){
                    msg = response.message;
                    li = '<li class=" bubble '+ msg.type +'"><img src="'+base_url+'application/uploads/users/'+msg.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <span class="chat-arrow"></span>\
                    <a href="javascript:void(0)" class="chat-name">'+msg.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+msg.time+'</span>\
                    <span class="chat-body">'+msg.body+'</span></div></li>';

                    $('ul.chat-box-body').append(li);

                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                }
            });
        }
});

/*----------------------------------------------------------------------------------------------------
| Function to load messages
-------------------------------------------------------------------------------------------------------*/
function shChatM()
{
    refresh = setInterval(function()
    {
 
    $.ajax(
        {
            type: 'GET',
            url : base + "chat/chatheartbeat/",
            async : true,
            cache : false,
            success: function(data){
                if(data.success){
                     thread = data.messages;
                     senders = data.senders;
                     $.each(thread, function() {
                        if($("#chat-box").is(":visible")){
                            chatbuddy = $("#chat_buddy_id").val();
                                if(this.sender == chatbuddy){
                                  li = '<li class="'+ this.type +'"><img src="'+base_url+'application/uploads/users/'+this.avatar+'" class="avt img-responsive">\
                                    <div class="message">\
                                    <span class="chat-arrow"></span>\
                                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                                    <span class="chat-datetime">at '+this.time+'</span>\
                                    <span class="chat-body">'+this.body+'</span></div></li>';
                                    $('ul.chat-box-body').append(li);
                                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                                    //Mark this message as read
                                $.ajax({ type: "POST", url: base + "chat/mark_read", data: {id: this.msg}});
                                }
                                else{
                                    from = this.sender;
                                    $.each(senders, function() {
                                        if(this.user == from){
                                            $(".chat-group").find('span[rel="'+from+'"]').text(this.count);
                                        }
                                    });
                                }
                         }
                         else{
                            from = this.sender;
                            $.each(senders, function() {
                                if(this.user == from){
                                    $(".chat-group").find('span[rel="'+from+'"]').text(this.count);
                                }
                            });
                            
                         }
                     });

                    //var audio = new Audio('assets/notify/notify.mp3').play();
                }
            },
                error : function(XMLHttpRequest, textstatus, error) { 
                            console.log(error); 
                }
        }
    );

       }, 2000);
}

/*----------------------------------------------------------------------
| Function to load threaded messages or user conversation
------------------------------------------------------------------------*/


/*----------------------------------------------------------------------
| Function to send message via inbox section
------------------------------------------------------------------------*/

$(document).on('click', '[data-toggle="inboxMsgs"]', function(){  
         userID = $(this).find('input[name="Msguser_id"]').val();
         load_message_section(userID);
});


/*----------------------------------------------------------------------
| Function to send message from inbox section
------------------------------------------------------------------------*/
$(document).on('keypress', '.Msg_chat-textarea input', function(e){
        var txtarea = $(this);
        var message = txtarea.val();
		var userID = $('#Msg_chat_buddy_id').val();
		
        if(message !== "" && e.which == 13){
            txtarea.val('');
            // save the message 
            $.ajax({ 
			type: "POST", 
			url: base  + "chat/send_message", 
			data: {message: message, user : userID},
			cache: false,
                success: function(response){
                    msg = response.message;
                    li = '<li class=" bubble '+ msg.type +'" id="msg_'+ msg.msg +'">\
					<input type="checkbox" value="'+ msg.msg +'" class="checkbx" name="deleteMsg"/>\
					<img src="'+base_url+'application/uploads/users/'+msg.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a href="javascript:void(0)" class="chat-name">'+msg.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+msg.time+'</span>\
					<div class="clr"></div>\
                    <span class="chat-body">'+msg.body+'</span></div></li>';

                    $('ul.Msg_chat-box-body').append(li);

                    //$('ul.Msg_chat-box-body').animate({scrollTop: $('ul.Msg_chat-box-body').prop("scrollHeight")}, 500);
					$(".Msg_chat_container").animate({ scrollTop: $(".Msg_chat_container").attr("scrollHeight") }, 500);
                }
            });
        }
});



var limit = 1;
function load_thread(user, limit){
        //send an ajax request to get the user conversation 
       $.ajax({ type: "POST", url: base  + "chat/load_messages", data: {user : user, limit:limit },cache: false,
        success: function(response){
        if(response.success){
            buddy = response.buddy;
            status = buddy.status == 1 ? 'Online' : 'Offline';
            statusClass = buddy.status == 1 ? 'user-status is-online' : 'user-status is-offline';

            $('#chat_buddy_id').val(buddy.id);
            $('.display-name', '#chat-box').html(buddy.name);
            $('#chat-box > .chat-box-header > small').html(status);
            $('#chat-box > .chat-box-header > span.user-status').removeClass().addClass(statusClass);

            $('ul.chat-box-body').html('');
            if(buddy.more){
             $('ul.chat-box-body').append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+buddy.remaining+')</a></li>');
            }
 

                thread = response.thread;
                $.each(thread, function() {
                  li = '<li class="'+ this.type +'"><img src="'+base_url+'application/uploads/users/'+this.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <span class="chat-arrow"></span>\
                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+this.time+'</span>\
                    <span class="chat-body">'+this.body+'</span></div></li>';

                    $('ul.chat-box-body').append(li);
                });
                if(buddy.scroll){
                    $('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
                }
                
            }
        }});
}






/*----------------------------------------------------------------------
| Function to message inbox section
------------------------------------------------------------------------*/
var limit_msg = 1;
function load_message_section(userID, limit_msg){
	
	$('input.checkbx, #deletemsgbtns').hide();
	
        //send an ajax request to get the user conversation 
       $.ajax({ type: "POST", url: base  + "chat/load_messages", data: {user : userID, limit:limit_msg },cache: false,
        success: function(response){
        if(response.success){
            user = response.buddy;
            status = user.status == 1 ? 'Online' : 'Offline';
            statusClass = user.status == 1 ? 'user-status is-online' : 'user-status is-offline';

            $('#Msg_chat_buddy_id').val(user.id);
            $('h4.display-name').html(user.name+' ('+status+')');
            //$('.chat-box > .chat-box-header > small').html(status);
            //$('.chat-box > .chat-box-header > span.user-status').removeClass().addClass(statusClass);

            $('ul.Msg_chat-box-body').html('');
            if(user.more){
             $('ul.Msg_chat-box-body').append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_message_section(\''+user.id+'\', \''+user.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+user.remaining+')</a></li>');
            }
 

                thread = response.thread;
                $.each(thread, function() {
                  li = '<li class="'+ this.type +'" id="msg_'+ this.msg +'">\
				  <input type="checkbox" value="'+ this.msg +'" class="checkbx" name="deleteMsg"/>\
				  <img src="'+base_url+'application/uploads/users/'+this.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a class="chat-name">'+this.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+this.time+'</span>\
					<div class="clr"></div>\
                    <span class="chat-body">'+this.body+'</span></div></li>';

                    $('ul.Msg_chat-box-body').append(li);
                });
                if(user.scroll){
                    $('ul.Msg_chat-box-body').animate({scrollTop: $('ul.Msg_chat-box-body').prop("scrollHeight")}, 500);
                }
                
            }
        }});
}

