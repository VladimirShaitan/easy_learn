            <div class="fre-perfect-freelancer">
                <div class="container">
<section  class="">
<div class="container">
	<div class="row orders-profile">
         <div class="col-md-12">
      <br/> 
    
        <ul class="nav nav-tabs" id="myTab" data-tabs="tabs">
       <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-envelope-o"></i> Сообщения</a></li>

     </ul>
    
    <div class="tab-content">
            <div class="tab-pane active" id="inbox">
                 <h4>Online</h4>
                  <div class="row">
                    	<div class="col-sm-3" id="usersListWrapper">
                        	
                        	<ul>
                            
							<?php
							$currentUserID = $this->session->userdata('writer_id'); 	
  								 if(isset($users_all)){
 							    	foreach($users_all->result() as $res){ 
										if( ($res->writer_id != $currentUserID) &&  ($res->user_level != $user_status->user_level) && ($res->user_level !='admin') ){ //print_r($user);   ?>
                                    <li>
                                    
                                    <span class="user_status">
                                                     <?php $status = $res->loggedin == 1 ? 'is-online' : 'is-offline'; ?> 
            <span class="user-status <?php echo $status; ?>"></span>
                                                </span>
                                             <a data-toggle="inboxMsgs" href="javascript: void(0)" data-original-title="" title="">
                                            
                                            <div class="contact-wrap">
                                              <input type="hidden" name="Msguser_id" value="<?php echo $res->writer_id;?>">
                                               <div class="contact-profile-img">
                                                   <div class="profile-img">
                                                 <img class="img-responsive" src="<?php echo ci_site_url(); ?>../uploads/profiles/<?php echo $res->profile_img;?>" alt="Profile"/>
                                                   </div>
                                               </div>
                                                <span class="contact-name">
                                                    <small class="user-name"><?php echo ucwords($res->firstname.' '.$res->lastname); ?></small>
                                                 </span>
                                                
                                            </div>
    </a>
                                        
										 <?php 	} ?>
                                         </li>
                                         <?php 
									  }
								  }
							  ?>
                        		</ul>
                        
                        </div>


                   		<div class="col-sm-7" id="userMessageWrapper">
                        	<div class="row">
                            	<h4 class="display-name"></h4>
                            </div> 
                            <div class="col-sm-4">
  
                                 <span class="dropdown user-dropdown relative">

                                 <ul class="dropdown-menu">
                                     <li>
                                        <a href="javascript: void(0);" id="delete_messages">
                                          <span class="pull-left">Удалить сообщение</span>
                                         </a>
                                    </li>
                                 </ul> 
                                </span>
 
                            </div>   
                            <hr/>
                             <div class="Msg_chat_container">
                                <div class="Msg_chat-content">
                                    <input type="hidden" name="Msg_chat_buddy_id" id="Msg_chat_buddy_id"/>
                                    <ul class="Msg_chat-box-body"></ul>
                                </div>
                             </div>
                              <hr/>
							  <div id="deletemsgbtns">
                              	Выбрать сообщение 
                                <input type="button" value="Cancel" id="CancelMsgBtn" class="btn btn-info"/>
                                <input type="button" value="Delete" id="DeleteMsgBtn" class="btn btn-danger"/>
                              </div>
                              <br/>
                              <div class="Msg_chat-textarea">
                                    <input class="form-control" />
                              </div>

                        </div>
                  </div>
                 
                 
                 
                 
                 
          </div>
          <div class="tab-pane" id="sent">
                 <h2>Сообщение</h2>
          </div>
          <div class="tab-pane" id="assignment">
                <h2>Compose</h2>     
         </div>
           
     </div>
     
     

     </div>
	</div>
    
    
</div>
    </section>
    <!--/ work-shop-->
  </div>
</div>