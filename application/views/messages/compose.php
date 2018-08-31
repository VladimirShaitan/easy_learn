<div class="col-md-8 private-message-reply-contents" style ="display:block">
<div class="row">
<div class="col-md-12  col-sm-12 col-xs-12">
<div class="inbox-content-wrap">
<h2 class="inbox-project-title">

<?php 
$receiverid = $this->session->userdata('writer_id'); 
$this->db->where(array('receiverid' => $receiverid, 'msg_type' =>  'message', 'msg_read' =>0 ));
$unreadmessages = $this->db->count_all_results('messages');  



$this->db->where(array('msg_type' =>  'message', 'senderid' => $receiverid));
$allsent = $this->db->count_all_results('messages');  
?>
     <div class="row">
<div class="col-md-3"><a href="<?php echo site_url(); ?>messages/messages" class="col-md-12"><i class="fa fa-send"></i> Входящие (<?php echo $unreadmessages; ?>)</a>
</div>
<div class="col-md-3">
<a href="<?php echo site_url(); ?>messages/outbox" class="col-md-12"><i class="fa fa-share-alt"></i> Исходящие (<?php echo $allsent; ?>)</a></div>
<div class="col-md-2"> <a href="<?php echo site_url(); ?>messages/compose" class="col-md-12"><i class="fa fa-plus"></i> Написать менеджеру </a>
</div>
</div>
<span class="fre-back-inbox-btn visible-sm visible-xs">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</span>
<span class="title-conversation" style="text-decoration: none"></span>
</h2>
<div class="fre-conversation-wrap fre-inbox-message" style="position: relative">
<ul class="fre-conversation-list">

<?php echo form_open('Messages/message_submit');?>
<div class='jsError'></div>

<div class="form-group">
<label class="control-label col-sm-2" for="email">Выбрать менеджера</label>
<div class="col-sm-10">
<select name='receiverid' type='hidden'  class="form-control"  >
<?php foreach ($admins as $admins) { ?>
<option type='hidden' class="form-control" value="<?php echo $admins['writer_id']; ?>">
<?php echo $admins['firstname']; ?> <?php echo $admins['lastname']; ?>
</option>
<?php } 
?>
</select>
</div><br/><br/>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="email">Тема*</label>
<div class="col-sm-10">
<input type='input' required class="form-control" name='msg_title' value="">
</div><br/><br/>
</div>


<div class="form-group">
<label class="control-label col-sm-2" for="email">Сообщение*</label>
<div class="col-sm-10">
<textarea class="form-control" required rows="5" name="msg_body"></textarea>
</div><br/><br/>
</div><br/>
<input type="hidden" class="form-control" name='senderid' value = "<?php echo $this->session->userdata('writer_id')?>" />
<input type="hidden" class="form-control" name='sender_name' value = "<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>" />

<button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Отправить</button>
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

