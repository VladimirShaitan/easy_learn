                            <div class="col-md-8 private-message-reply-contents" style ="display:block">
                        <div class="row">
            <div class="col-md-12  col-sm-12 col-xs-12">
                <div class="inbox-content-wrap">
                    <h2 class="inbox-project-title">

<?php 
$receiverid = $this->session->userdata('writer_id'); 
$this->db->where(array('receiverid' => $receiverid, 'msg_type' =>  'message', 'msg_read' =>0 ));
$unreadmessages = $this->db->count_all_results('messages');  

$this->db->where(array('msg_type' =>  'message','senderid' => $receiverid));
$allsent = $this->db->count_all_results('messages');  
?>
    <div class="row">

<div class="col-md-3"><a href="<?php echo ci_site_url(); ?>messages/messages" class="col-md-12"><i class="fa fa-send"></i> Входящие(<?php echo $unreadmessages; ?>)</a></div> 
                 
<div class="col-md-3"><a href="<?php echo ci_site_url(); ?>messages/outbox" class="col-md-12"><i class="fa fa-share-alt"></i> Исходящие(<?php echo $allsent; ?>)</a></div>
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

<h3>Сообщение |  <?php echo $messages['msg_title']; ?></h3>


                        <ul class="media-list">
                           <li class="media media-replied">
<!--                               <div class="pull-left pfotimg">
                                 <img class="profile-fot0" src="<?php echo base_url()?>assets/images/placeholder.jpg" alt="image" />
                              </div> -->
                              <div class="media-body">
                                 <div class="well well-lg">
                                    <h4 class="media-heading text-uppercase reviews"><span class="fa fa-share-alt"></span> <?php echo $messages['sender_name']; ?></h4>
                                    <ul class="media-date text-uppercase reviews list-inline">
                                       <p>Дата отправки: <?php echo $messages['msg_date']; ?> </p>
                                    </ul>
                                    <p class="media-comment">
                                       <?php echo $messages['msg_body']; ?>
                                    </p>
                                 </div>
                              </div>
                           </li>
                        </ul>

<hr/>
<h4>Ответ</h4>
<hr/>

<?php foreach ($replies as $replies): ?>


                        <ul class="media-list">
                           <li class="media media-replied">
                              <!-- <div class="pull-left pfotimg">
                                 <img class="profile-foto" src="<?php echo base_url()?>assets/images/placeholder.jpg" alt="image" />
                              </div> -->
                              <div class="media-body">
                                 <div class="alert-info alert well-lg">
                                  <div class="row">
                                    <h4 class="media-heading pull-left reviews"><span class="fa fa-share-alt"></span> <?php echo $replies['senderid']; ?></h4>
                                    <ul class="media-date pull-right reviews list-inline">
                                       <p>Дата отправки: <?php echo $replies['msg_date']; ?> </p>
                                    </ul>
                                  </div>
                                    <p class="">
                                       <?php echo $replies['msg_body']; ?>
                                    </p>
                                 </div>
                              </div>
                           </li>
                        </ul>
 <?php endforeach; ?>


                        <?php echo form_open('Messages/message_reply');?>
                        <div class='jsError'></div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Ответ</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" name="msg_body"></textarea>
      </div><br/><br/>
    </div><br/>
    <input type='hidden' name='receiverid' value="<?php echo $messages['senderid']; ?>" readonly>
    <input type='hidden' name='msg_title' value="<?php echo $messages['msg_title']; ?>" readonly>
    <input type='hidden' name='msg_id' value="<?php echo $messages['msg_id']; ?>" readonly>
<input type='hidden' name='receiver_name' value="<?php echo $messages['sender_name']; ?>" readonly>
  <input type="hidden" name='senderid' value = "<?php echo $this->session->userdata('writer_id'); ?>" readonly/>
<input type="hidden" name='sender_name' value = "<?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?>" readonly />
 
                           <button class="btn btn-success btn-circle text-uppercase pull-right" type="submit" id="submitComment"><span class="fa fa-send"></span> Сообщение</button>
                        <?php echo form_close();?>  



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
  