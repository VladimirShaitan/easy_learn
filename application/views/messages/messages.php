<div class="col-md-8 private-message-reply-contents" style ="display:block">
	<div class="row">								    
    <div class="col-md-12  col-sm-12 col-xs-12">
    <div class="inbox-content-wrap">
        <h2 class="inbox-project-title">
           <?php 
          $receiverid = $this->session->userdata('writer_id'); 
          $this->db->where(array('receiverid' => $receiverid, 'msg_read' =>0 ));
          $unreadmessages = $this->db->count_all_results('messages');  

          $this->db->where(array('msg_type' =>  'message','senderid' => $receiverid));
          $allsent = $this->db->count_all_results('messages');  
          ?>
                              	                                   <div class="row">
          <div class="col-md-3"><a href="<?php echo ci_site_url(); ?>messages/messages" class="col-md-12"><i class="fa fa-send"></i> Входящие (<?php echo $unreadmessages; ?>)</a>
          </div>
          <div class="col-md-3">
          <a href="<?php echo ci_site_url(); ?>messages/outbox" class="col-md-12"><i class="fa fa-share-alt"></i> Исходящие (<?php echo $allsent; ?>)</a></div>
          <div class="col-md-2"> <a href="<?php echo ci_site_url(); ?>messages/compose" class="col-md-12"><i class="fa fa-plus"></i> Написать </a>
          </div>
          </div>
        <span class="fre-back-inbox-btn visible-sm visible-xs">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </span>
        <span class="title-conversation" style="text-decoration: none"></span>
        </h2>
        <div class="fre-conversation-wrap fre-inbox-message" style="position: relative">
            <ul class="fre-conversation-list">

    <table class="table table-hover table-striped text-left">
      <tbody>
        <h5> Непрочитанные сообщения</h5>
        <?php foreach ($newmessages as $newmessages): ?>
            <tr>
              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
              <td class="mailbox-name text-left"><a href="<?php echo ci_site_url('messages/read/'.$newmessages['msg_id']); ?>"><?php echo $newmessages['sender_name']; ?></a></td>
              <td class="mailbox-subject text-left"><a href="<?php echo ci_site_url('messages/read/'.$newmessages['msg_id']); ?>"><?php echo $newmessages['msg_title']; ?></a>
              </td>
              <td class="mailbox-attachment"></td>
              <td class="mailbox-date"><?php echo date('dS,F,Y',strtotime($newmessages['msg_date']));?></td>
            </tr>
        <?php endforeach; ?> 
     </tbody>
     </table>
<h5> Прочитанные сообщения </h5>    
<table class="table table-hover table-striped text-left">
      <tbody>             	
<?php foreach ($messages as $messages): ?>
      <tr>
        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
        <td class="mailbox-name text-left"><a href="<?php echo ci_site_url('messages/read/'.$messages['msg_id']); ?>"><?php echo $messages['sender_name']; ?></a></td>
        <td class="mailbox-subject text-left"><a href="<?php echo ci_site_url('messages/read/'.$messages['msg_id']); ?>"><?php echo $messages['msg_title']; ?></a>
        </td>
        <td class="mailbox-attachment"></td>
        <td class="mailbox-date"><?php echo date('dS,F,Y',strtotime($messages['msg_date']));?></td>
      </tr>

<?php endforeach; ?>
</tbody>
</table>



  </tbody>
</table>

            </ul>
        </div>

    </div>
</div>
</div>
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
