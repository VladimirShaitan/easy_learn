 //jQuery.noConflict(); 
jQuery(document).ready(function(){
var base = 'http://labs.webexplorar.com/opskill/'; 

jQuery(document).on('click', '#usersListWrapper li', function(){
     jQuery('#usersListWrapper li').each( function(i,e) {
		jQuery(this).removeClass('activeUser'); 
	 });
	 jQuery(this).removeClass().addClass('activeUser');    
});


/*----------------------------------------------------------------------
| logout function
------------------------------------------------------------------------*/
jQuery(document).on('click', '#logout', function(){
        jQuery.ajax({
            type: "POST",
            url: base  + "user/logout",//localhost/codeigniter/index.php/users/logout
            cache: false,
            beforeSend: function(){},
            success: function(response){  
				window.location = base;
			}
        });
    return false;
});



/*----------------------------------------------------------------------
| change status Function
------------------------------------------------------------------------*/
jQuery(document).on('click', '.btnStatus', function() {
    //jQuery(this).find('.btn').toggleClass('active');  
    //if (jQuery(this).find('.btn-success').size()>0) {
     //jQuery(this).toggleClass('btn-success');
		var chatStat = jQuery(this).attr('id');
		var stt = 0;
		if(chatStat == 'online'){
             jQuery(this).removeClass('btn-default').addClass('btn-success');
			 jQuery('.status-btn-group button#offline').removeClass('btn-success').addClass('btn-default');
			 stt = 1;
        }            
        if(chatStat == 'offline'){
             jQuery(this).removeClass('btn-default').addClass('btn-success');
			 jQuery('.status-btn-group button#online').removeClass('btn-success').addClass('btn-default');
			 stt = 0;
        } 
		
 		jQuery.ajax({ 
			type: "POST", 
			url: base  + "chat/change_status", 
			data: {status : stt},
			cache: false,		
             success: function(response){
                if(response.status == 1){
                    jQuery('#current_status').html('Online');
                    jQuery('#current_status').removeClass('btn-danger').addClass('btn-success');
                }            
                else{
                    jQuery('#current_status').html('Offline');
                    jQuery('#current_status').removeClass('btn-success').addClass('btn-danger');
                }
        }});
   // }    
     //jQuery(this).toggleClass('btn-default');
});




/*----------------------------------------------------------------------
| Show Pop overs
------------------------------------------------------------------------*/
   var popOverSettings = {
        container: 'body',
        trigger:'hover',
        selector: '[data-toggle="popover"]',
        placement: 'left',
        html: true,
        content: function () {
            return jQuery('#popover-content').html();
        }
    }

   jQuery(document).on("mouseenter",'[data-toggle="popover"]',function(){
      
	  if(window.innerWidth <= 800 && window.innerHeight <= 600) { 
	  
	  } else {
		  image  = jQuery(this).find('.profile-img').html();
		  name   = jQuery(this).find('.user-name').html();
		  status = jQuery(this).find('.user_status').html();
		  jQuery('#contact-image').empty().html(image);
		  jQuery('#contact-user-name').empty().html(name);
		  jQuery('#contact-user-status').empty().html(status);
		  
		  jQuery(this).popover({
			placement:'left', 
			trigger: 'hover',
			container: 'body',
			selector: '[data-toggle="popover"]',
			html: true,
			content: function () {
				return jQuery('#popover-content').html();
			}
		  }).popover('show');
	  }

    }).on('mouseleave', '[data-toggle="popover"]', function() {
       if(window.innerWidth <= 800 && window.innerHeight <= 600) { 
 	  	} else {
	    jQuery(this).popover('hide');
		}
    });





//jQuery('#myTab').tab();


//jQuery('.chat-box-header').

jQuery(document).on('click','.chat-box-header', function(){
    //jQuery('.chat-container').toggle();
	var chatboxid = jQuery(this).parent().attr("id");
	//jQuery('#'+chatboxid).hide();
	jQuery('#'+chatboxid+' .chat-container').toggle();
 });

/*----------------------------------------------------------------------
| Close the chat container
------------------------------------------------------------------------*/
//jQuery(document).on('click', '.chat-form-close', function(){
jQuery('.chat-form-close').click(function(){
	
    jQuery('#chat-container').toggle('slide', {
        direction: 'right'
    }, 500);
    //jQuery('.chat-box').hide();
});




//  mobile devices **************************************************************

 if(window.innerWidth <= 800 && window.innerHeight <= 600) { 
 	
 
 
 
 } else {



 }




/*----------------------------------------------------------------------
| Close the chat box window
------------------------------------------------------------------------*/
jQuery(document).on('click','a.chat-box-close', function(){
    //jQuery('.chat-box').hide();
    //jQuery('#chat-container .chat-group a').removeClass('active');
	var chatboxid = jQuery(this).parent().parent().attr("id");
	jQuery('#'+chatboxid).remove();
	
	restructureChatBoxes();
});

/*----------------------------------------------------------------------
| Display the chat container
------------------------------------------------------------------------*/
jQuery('.btn-chat').click(function () {
    if(jQuery('.chat-box').is(':visible')){
        jQuery('#chat-container').toggle('slide', {
            direction: 'right'
        }, 500);
        jQuery('.chat-box').hide();
    } else{
        jQuery('#chat-container').toggle('slide', {
            direction: 'right'
        }, 500);
        chat_init();
    }
});
  
 
jQuery('a#delete_messages') .click(function () {
	jQuery('input.checkbx, #deletemsgbtns').show();
 });

jQuery('input#DeleteMsgBtn') .click(function () {
	if( jQuery('input.checkbx:checkbox:checked').length > 0 ){
		
		var r=confirm("Are you sure you want to delete?");
		 if(r==true)		
		 {
				
		var userID = jQuery('#Msg_chat_buddy_id').val();
		
		var deleMsgStr = '';
		jQuery('input.checkbx:checkbox:checked').each(function() {
            deleMsgStr += jQuery(this).val()+',';
        });
		
		
		jQuery.ajax({ 
			type: "POST", 
			url: base  + "chat/delete_messages", 
			data: {message: deleMsgStr},
			cache: false,
                success: function(response){
                    msg = response.message;
					if(msg==1) {
						load_message_section(userID);
						jQuery('input.checkbx, #deletemsgbtns').hide();
					}
                     
                }
            });
			
		 }
		
	} //else { alert('Please select a message to delete'); }
	
});	



jQuery('input#CancelMsgBtn') .click(function () {
	jQuery('input.checkbx, #deletemsgbtns').hide();
	
});	



/// /////////////////////


 
jQuery('.chat-floting-btn') .click(function () {
 	jQuery('#chat-container').toggle('slide', {
        direction: 'right'
    }, 500);
	
});	


 
});



function restructureChatBoxes() {
	var align = 0;
	//alert(1);
	var chatBoxes = new Array();
	
	jQuery('.chat-box').each( function(i,e) {
		/* you can use e.id instead of jQuery(e).attr('id') */
		chatBoxes.push(jQuery(e).attr('id'));
	});
	
	//alert(chatBoxes);
	for (x in chatBoxes) {
		chatboxID = chatBoxes[x];

		if(jQuery("#"+chatboxID).is(':visible')){
			if (align == 0) {
				jQuery("#"+chatboxID).css('right', '290px');
			} else {
				width = (align)*(280+20)+300;
				jQuery("#"+chatboxID).css('right', width+'px');
			}
			align++;
		}
	}
}

/* ************************************************* */
/*
|-------------------------------------------------------------------------
| Copyright (c) 2015 
| This script may be used for non-commercial purposes only. For any
| commercial purposes, please contact the author at sumith.harshan@gmail.com
|-------------------------------------------------------------------------
*/

/*
|-------------------------------------------------------------------------
| Funtion to trigger the refresh event
|-------------------------------------------------------------------------
*/
 shChat();

/*----------------------------------------------------------------------
| Function to display individual chatbox
------------------------------------------------------------------------*/

jQuery(document).on('click', '[data-toggle="popover"]', function(){  
        jQuery(this).popover('hide');
        //jQuery('ul.chat-box-body').empty();
		
         user = jQuery(this).find('input[name="user_id"]').val();
          //alert(user);
		if(jQuery('#chat-box-'+user).is(':visible')){
			load_thread(user);
			jQuery('#chat-box-'+user+' .chat-box-header').fadeTo(100, 0.1).fadeTo(200, 1.0); 
		} else {
				 
				 jQuery(this).find('span[rel="'+user+'"]').text('');
				 jQuery("ul#chat_box_body_id-"+user).empty();
				
						 var chatboxContents = "<div class=\"chat-box\" style=\"bottom: 0\" id=\"chat-box-"+user+"\">\
										<div class=\"chat-box-header\">\
											<a href=\"javascript: void(0);\" class=\"chat-box-close pull-right\">\
												<i class=\"fa fa-remove\"></i>\
											</a>\
											<span class=\"user-status is-online\"></span>\
											<span class=\"display-name\"></span>\
											<small></small>\
											<span class=\"tinyMsgCount\"></span>\
										</div>\
										<div class=\"chat-container\">\
											<div class=\"chat-content\">\
												<input type=\"hidden\" name=\"chat_buddy_id\" id=\"chat_buddy_id\"/>\
												<ul class=\"chat-box-body\" id=\"chat_box_body_id-"+user+"\"/></ul>\
											</div>\
											<div class=\"chat-textarea\">\
												<input class=\"form-control\" />\
												<input type=\"hidden\" name=\"chat_buddy_id\" id=\"chat_buddy_id\"/>\
											</div>\
										</div>\
										</div>";
										
				 //jQuery( "#chatWrap" ).after(chatboxContents);
				 jQuery( "body" ).after(chatboxContents);
				 
				//jQuery('.chat-box').attr('id','chat-box-'+user);
				load_thread(user);
		
				//var offset = jQuery(this).offset(); 
				//var h_main = jQuery('#chat-container').height();
				//var h_title = jQuery("#chat-box-"+user+" .chat-box > .chat-box-header").height();
				//var top = (jQuery('#chat-box-'+user+' .chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
				//if((top + jQuery('#chat-box-'+user+' .chat-box').height()) > h_main){ top = h_main -  jQuery('#chat-box-'+user+' .chat-box').height();}
				//jQuery('.chat-box').css({'top': top});
				jQuery('#chat-box-'+user+' .chat-box').css({'bottom': 0});
				 jQuery('#chat-box-'+user+' .chat-box').css({'position': 'fixed'});
				
				 /*if(!jQuery('.chat-box').is(':visible')){
					//alert('Not visible');
 					// jQuery('#chat-box-'+user).css({'right': '280px'});
				 } else {//alert(' visible'); 
					
					 
					var cblngth = jQuery('.chat-box').length;  //300px
					
					var rgh = (300*cblngth);//alert(rgh);
					jQuery('#chat-box-'+user).css({'right': rgh+'px'});
					
					
				  }*/
			// 
 				 var chatBoxes = new Array();
	
				 jQuery('.chat-box').each( function(i,e) {
 					chatBoxes.push(jQuery(e).attr('id'));
				 });
 	 
 					 
				var total_popups = 0;	
  				 var right = 280;
               
                var iii = 0;
                for(iii; iii < chatBoxes.length; iii++)
                {
                    if(chatBoxes[iii] != undefined)
                    {
                        var element = document.getElementById(chatBoxes[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }
 				 
  				
				 jQuery('#chat-box-'+user+' .chat-container').show();
				 jQuery('#chat-box-'+user).show();
				
				jQuery('#chat-box-'+user+' .chat-box-body').slimScroll({ scrollBy: '300px' });
				// FOCUS INPUT TExT WHEN CLICK
				jQuery("#chat-box-"+user+" .chat-box .chat-textarea input").focus();
 				
		}
 
});




/*----------------------------------------------------------------------
| Function to send message via inbox section
------------------------------------------------------------------------*/

jQuery(document).on('click', '[data-toggle="inboxMsgs"]', function(){  
         userID = jQuery(this).find('input[name="Msguser_id"]').val();
         load_message_section(userID);
});




/*----------------------------------------------------------------------
| Function to send message
------------------------------------------------------------------------*/
jQuery(document).on('keypress', '.chat-textarea input', function(e){
        var txtarea = jQuery(this);
        var message = txtarea.val();
        if(message !== "" && e.which == 13){
            txtarea.val('');
			
		var userID = jQuery(this).next('#chat_buddy_id').val();
			
            // save the message 
			//alert(userID); 
            jQuery.ajax({ 
			type: "POST", 
			url: base  + "chat/send_message", 
			data: {message: message, user : userID},
			cache: false,
                success: function(response){
                    msg = response.message;
                    li = '<li class=" bubble '+ msg.type +'">\
 					<img src="'+base_url+'uploads/profiles/'+msg.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a href="javascript:void(0)" class="chat-name">'+msg.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+msg.time+'</span>\
                    <span class="chat-body">'+msg.body+'</span></div></li>';

                    jQuery('div#chat-box-'+userID+' ul#chat_box_body_id-'+userID).append(li);

                    jQuery('div#chat-box-'+userID+' ul#chat_box_body_id-'+userID).animate({scrollTop: jQuery('div#chat-box-'+userID+' ul#chat_box_body_id-'+userID).prop("scrollHeight")}, 500);
                }
            });
        }
});





/*----------------------------------------------------------------------
| Function to send message from inbox section
------------------------------------------------------------------------*/
jQuery(document).on('keypress', '.Msg_chat-textarea input', function(e){
        var txtarea = jQuery(this);
        var message = txtarea.val();
		var userID = jQuery('#Msg_chat_buddy_id').val();
		
        if(message !== "" && e.which == 13){
            txtarea.val('');
            // save the message 
			//alert(userID);
            jQuery.ajax({ 
			type: "POST", 
			url: base  + "chat/send_message", 
			data: {message: message, user : userID},
			cache: false,
                success: function(response){
                    msg = response.message;
                    li = '<li class=" bubble '+ msg.type +'" id="msg_'+ msg.msg +'">\
					<input type="checkbox" value="'+ msg.msg +'" class="checkbx" name="deleteMsg"/>\
					<img src="'+base_url+'uploads/profiles/'+msg.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a href="javascript:void(0)" class="chat-name">'+msg.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+msg.time+'</span>\
					<div class="clr"></div>\
                    <span class="chat-body">'+msg.body+'</span></div></li>';

                    jQuery('ul.Msg_chat-box-body').append(li);

                    //jQuery('ul.Msg_chat-box-body').animate({scrollTop: jQuery('ul.Msg_chat-box-body').prop("scrollHeight")}, 500);
					jQuery(".Msg_chat_container").animate({ scrollTop: jQuery(".Msg_chat_container").attr("scrollHeight") }, 500);
                }
            });
        }
});







/*----------------------------------------------------------------------------------------------------
| Function to load messages
-------------------------------------------------------------------------------------------------------*/
function shChat()
{
    var soundCount = false;
	refresh = setInterval(function()
    {
 
    jQuery.ajax(
        {
            type: 'GET',
            url : base + "chat/chatheartbeat/",
            async : true,
            cache : false,
            success: function(data){
                if(data.success){
                     thread = data.messages;
                     senders = data.senders;  //alert(data.recipient);
					 var msgCnt = 1;
                     jQuery.each(thread, function() {
						  //jQuery("#chat-box-"+this.sender).css('border','red');
                        if(jQuery("#chat-box-"+this.sender).is(":visible")){
                            chatbuddy = jQuery('div#chat-box-'+this.sender+' .chat-container input#chat_buddy_id').val();//jQuery("#chat_buddy_id").val();
							
                                if(this.sender == chatbuddy){
                                  li = '<li class="'+ this.type +'">\
 								  <img src="'+base_url+'uploads/profiles/'+this.avatar+'" class="avt img-responsive">\
                                    <div class="message">\
                                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                                    <span class="chat-datetime">at '+this.time+'</span>\
                                    <span class="chat-body">'+this.body+'</span></div></li>';
                                    jQuery('div#chat-box-'+chatbuddy+' ul#chat_box_body_id-'+chatbuddy).append(li);
                                    jQuery('div#chat-box-'+chatbuddy+' ul#chat_box_body_id-'+chatbuddy).animate({scrollTop: jQuery('div#chat-box-'+chatbuddy+' ul#chat_box_body_id-'+chatbuddy).prop("scrollHeight")}, 500);
                                    //Mark this message as read
                                 jQuery.ajax({ type: "POST", url: base + "chat/mark_read", data: {id: this.msg}});
 								 //alert(1);
                                }
                                else{
                                    from = this.sender;
                                    jQuery.each(senders, function() {
                                        if(this.user == from){
                                            jQuery(".chat-group").find('span[rel="'+from+'"]').text(this.count);
											 var currntTitle = document.title;
											if(currntTitle.indexOf('(') === -1){
												var regExp = /\(([^)]+)\)/;
												if(matches) {
													var matches = regExp.exec(currntTitle);
													var totalMsg = matches[1]+this.count;
													document.title = '('+totalMsg+') '+document.title;
												}
											} 
											 jQuery('div#chat-box-'+from+'.chat-box div.chat-box-header span.tinyMsgCount').html(this.count);
											 jQuery('div#chat-box-'+from+'.chat-box div.chat-box-header span.tinyMsgCount').show();
											//tinyMsgCount
											//a//lert(2);
											//var audio = new Audio('http://labs.webexplorar.com/codeigniter-chat/application/assets/notify/notify.mp3').play(); 
                                        }
                                    });
                                }
                         }
                         else{
                            from = this.sender;
                            jQuery.each(senders, function() {
                                if(this.user == from){
                                    jQuery(".chat-group").find('span[rel="'+from+'"]').text(this.count);
									//alert(3);
									 var currntTitle = document.title;
											if(currntTitle.indexOf('(') === -1){
												var regExp = /\(([^)]+)\)/;
												var matches = regExp.exec(currntTitle);
												if(matches) {
													var totalMsg = matches[1]+this.count;
													document.title = '('+totalMsg+') '+document.title;
													
												}
											} 
									 jQuery('div#chat-box-'+this.sender+' .chat-box-header span.tinyMsgCount').html(this.count);
									 jQuery('div#chat-box-'+this.sender+' .chat-box-header span.tinyMsgCount').show();
									 jQuery('div#chat-box-2.chat-box div.chat-box-header span.tinyMsgCount').html(this.count);
									 jQuery('div#chat-box-2.chat-box div.chat-box-header span.tinyMsgCount').show();
									 
									 /*if (jQuery(".chat-group").find('span[rel="'+from+'"]').is(':empty') &&  (!soundCount) ){
									 	
									 } else {
										 var audio = new Audio('http://labs.webexplorar.com/codeigniter-chat/application/assets/notify/notify.mp3').play();
										 soundCount = true;
									 }*/
                                }
                            });
                            
                         }
						 msgCnt ++;
                     });
					// var audio = new Audio('http://labs.webexplorar.com/codeigniter-chat/application/assets/notify/notify.mp3').play();
                    
                }
            },
                error : function(XMLHttpRequest, textstatus, error) { 
                            console.log(error); 
                }
        }
    );

       }, 5000);
}

/*----------------------------------------------------------------------
| Function to load threaded messages or user conversation
------------------------------------------------------------------------*/
var limit = 1;
function load_thread(user, limit){
        //send an ajax request to get the user conversation 
       jQuery.ajax({ type: "POST", url: base  + "chat/load_messages", data: {user : user, limit:limit },cache: false,
        success: function(response){
        if(response.success){
            buddy = response.buddy;
            status = buddy.status == 1 ? 'Online' : 'Offline';
            statusClass = buddy.status == 1 ? 'user-status is-online' : 'user-status is-offline';
//alert(user);
            jQuery('div#chat-box-'+user+' .chat-container input#chat_buddy_id').val(buddy.id);
			
			//jQuery('div#chat-box-'+user+' .chat-container input#chat_buddy_id').css('border','red');
			
            jQuery('div#chat-box-'+user+' .chat-box-header span.display-name').html(buddy.name);
            jQuery('div#chat-box-'+user+' .chat-box-header > small').html(status);
            jQuery('div#chat-box-'+user+' .chat-box-header > span.user-status').removeClass().addClass(statusClass);
//console.log(jQuery('div#chat-box-'+user));
            jQuery('ul#chat_box_body_id-'+user).html('');
            if(buddy.more){
             jQuery('ul#chat_box_body_id-'+user).append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+buddy.remaining+')</a></li>');
            }
 

                thread = response.thread;
                jQuery.each(thread, function() {
                  li = '<li class="'+ this.type +'">\
 				  <img src="'+base_url+'uploads/profiles/'+this.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a href="javascript:void(0)" class="chat-name">'+this.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+this.time+'</span>\
                    <span class="chat-body">'+this.body+'</span></div></li>';

                    jQuery('ul#chat_box_body_id-'+user).append(li);
                });
                if(buddy.scroll){
                    /*jQuery('div#chat_box_body_id-'+user).animate({
						scrollTop: jQuery('ul#chat_box_body_id-'+user).prop("scrollHeight")
					}, 500);*/
					jQuery('div#chat_box_body_id-'+user).slimscroll({ scrollBy: '400px' });
                }
                
            }
        }});
}





/*----------------------------------------------------------------------
| Function to message inbox section
------------------------------------------------------------------------*/
var limit_msg = 1;
function load_message_section(userID, limit_msg){
	
	jQuery('input.checkbx, #deletemsgbtns').hide();
	
        //send an ajax request to get the user conversation 
       jQuery.ajax({ type: "POST", url: base  + "chat/load_messages", data: {user : userID, limit:limit_msg },cache: false,
        success: function(response){
        if(response.success){
            user = response.buddy;
            status = user.status == 1 ? 'Online' : 'Offline';
            statusClass = user.status == 1 ? 'user-status is-online' : 'user-status is-offline';

            jQuery('#Msg_chat_buddy_id').val(user.id);
            jQuery('h4.display-name').html(user.name+' ('+status+')');
            //jQuery('.chat-box > .chat-box-header > small').html(status);
            //jQuery('.chat-box > .chat-box-header > span.user-status').removeClass().addClass(statusClass);

            jQuery('ul.Msg_chat-box-body').html('');
            if(user.more){
             jQuery('ul.Msg_chat-box-body').append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_message_section(\''+user.id+'\', \''+user.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messsages('+user.remaining+')</a></li>');
            }
 

                thread = response.thread;
                jQuery.each(thread, function() {
                  li = '<li class="'+ this.type +'" id="msg_'+ this.msg +'">\
				  <input type="checkbox" value="'+ this.msg +'" class="checkbx" name="deleteMsg"/>\
				  <img src="'+base_url+'uploads/profiles/'+this.avatar+'" class="avt img-responsive">\
                    <div class="message">\
                    <a class="chat-name">'+this.name+'</a>&nbsp;\
                    <span class="chat-datetime">at '+this.time+'</span>\
					<div class="clr"></div>\
                    <span class="chat-body">'+this.body+'</span></div></li>';

                    jQuery('ul.Msg_chat-box-body').append(li);
                });
                if(user.scroll){
                    jQuery('ul.Msg_chat-box-body').animate({scrollTop: jQuery('ul.Msg_chat-box-body').prop("scrollHeight")}, 500);
                }
                
            }
        }});
}

