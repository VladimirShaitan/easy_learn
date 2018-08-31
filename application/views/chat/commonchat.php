 <?php
	ob_start();
	$_SESSION['username'] = $this->session->userdata('firstname'); // Must be already set
 ?>

<?php

 

 	 $userdata = $this->session->all_userdata();
	 
//print_r($userdata);

//if(isset($currentUserID) && ($users_all != NULL)) {
	
 	$currentUserID = $userdata['writer_id'];
	
	  $currentUserProfilePic = $userdata['profile_img'];
	  //print_r($user_status);
	  
 	  //foreach ($user_status->result() as $user) {
	 	 $currentStatus =  $user_status->loggedin;
		 $currentUserProfilePic= $user_status->profile_img;
	  //}
	 
	 
	 //foreach ($user_status->result() as $stat) { 
	 	//$currentStatus = $user_status->online;
	 //}
	 
 ?> 
<script type="text/javascript">
	var base = "<?php echo base_url().'index.php/';?>";
	var base_url = "<?php echo base_url();?>";
</script>
 
 <?php
 
$useragent=$_SERVER['HTTP_USER_AGENT'];

/*if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) { */?>

<!--<script type="text/javascript" src="<?php echo base_url(); ?>application/js/chatnx.js"></script>
-->
<?php 
//}
	//else { ?>
	<?php 
//}

 
?>
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>opasset/font-awesome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>application/css/chat.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/css/stylesnew.css" />
<?php //print_r($userdata); ?>


<!--CHAT CONTAINER STARTS HERE-->
<div id="chat-container" class="fixed">

 
<h2 class="chat-header">
     <i class="fa fa-comment"></i> 
    <span class="<?php  echo $currentStatus;?> btn btn-xs btn-<?php  echo $currentStatus== 1 ? 'success' : 'danger'; ?>" id="current_status"><?php echo $currentStatus== 1 ? 'Online' : 'Offline'; ?></span>

    <a href="javascript:;" class="chat-form-close pull-right"><i class="fa fa-remove"></i></a>
    <span class="dropdown user-dropdown">
    <a href="javascript:;" class="pull-right chat-config" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-cog"></i>
    </a>
    <ul class="dropdown-menu">
         <li class="divider"></li>
        <li>
            <a href="javascript: void(0);">
              <div class="btn-group btn-toggle status-btn-group"> 
                <button class="btn btnStatus btn-xs btn-<?php  echo $currentStatus== 1 ? 'success' : 'default'; ?>" id="online">Online</button>
                <button class="btn btnStatus btn-xs btn-<?php  echo $currentStatus== 0 ? 'success' : 'default'; ?>" id="offline">Offline</button>
              </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="javascript: void(0);" id="logout">
              <span class="pull-left">Sign Out</span>
              <span class="fa fa-sign-out pull-right"></span>
              <span class="clearfix"></span>
            </a>
        </li>
    </ul>
    </span>
</h2>




<!--
| CHAT CONTACTS LIST SECTION
-->
<div class="chat-inner" id="chat-inner" style="position:relative;">
<div class="chat-group">
 <strong>Users Online</strong>
 
 <?php 
 //$myfriends = getUsersListHelper();
 //print_r($currentUserID);
 foreach ($users_all->result() as $user) { 
 
 // check if logged and aloow only cha between client + writers 
 if( ($user->writer_id != $currentUserID) &&  ($user->user_level != $user_status->user_level) && ($user->user_level !='admin') ){ //print_r($user);?> 
    <a href="javascript: void(0)" data-toggle="popover" >
    <div class="contact-wrap">
      <input type="hidden" value="<?php echo $user->writer_id; ?>" name="user_id" />
        <div class="contact-profile-img">
           <div class="profile-img">
            <?php  $avatar = $user->profile_img != '' ? $user->profile_img : 'no-image.jpg' ; ?>
            <img src="<?php echo base_url(); ?>uploads/profiles/<?php echo $avatar; ?>" class="img-responsive">
           </div>
       </div> 
        <span class="contact-name">
            <small class="user-name"><?php echo ucwords($user->firstname.' '.$user->lastname)/*.'('.$user->user_level.')'*/; ?></small>
            <span class="badge progress-bar-danger" rel="<?php echo $user->writer_id; ?>"><?php //echo $user->unread; ?></span>
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
            <?php  $status = $user->loggedin == 1 ? 'is-online' : 'is-offline'; ?> 
            <span class="user-status <?php  echo $status; ?>"></span>
        </span>
    </div>
    </a>
 <?php  }} ?>
</div>

<div id="chat_settings_wrapper"></div>

</div>
<!--
| CHAT CONTACT HOVER SECTION
-->
<div class="popover" id="popover-content">
    <div id="contact-image"></div>
    <div class="contact-user-info">
        <div id="contact-user-name"></div>
        <div id="contact-user-status" class="online-status"></div>
    </div>
</div>


<?php
 
 $useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {  ?>

<!--
| INDIVIDUAL CHAT SECTION
-->
<div class="chat-box" id="chat-box" style="top: 400px">
<div class="chat-box-header">
    <a href="javascript: void(0);" class="chat-box-close pull-right">
        <i class="fa fa-remove"></i>
    </a>
    <span class="user-status is-online"></span>
    <span class="display-name"></span>
    <small></small>
</div>

<div class="chat-container">
    <div class="chat-content">
        <input type="hidden" name="chat_buddy_id" id="chat_buddy_id"/>
        <ul class="chat-box-body"></ul>
    </div>
    <div class="chat-textarea">
        <input placeholder="Type your message" class="form-control" />
    </div>
</div>
</div>

<?php 
 }
?>





</div>
<div class="chat-floting-btn">Chat</div>

<?php //} ?>
