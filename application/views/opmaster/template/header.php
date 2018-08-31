<!DOCTYPE html>
<html class='no-js' lang='ru'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Панель</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link rel="shortcut icon" href="/wp-content/uploads/2017/11/logo-FI.png" type="image/png">
     <link rel="stylesheet" type="text/css" href="<?=base_url()?>opasset/css/bootstrap.min.css">
    <link href="<?php echo base_url()?>adminassets/assets/stylesheets/application.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>adminassets/assets/stylesheets/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>opasset/css/bootstrap-datetimepicker.min.css" />
    <script type="text/javascript" src="<?=base_url()?>adminassets/assets/javascripts/jquery.min.js"></script>
    <script src="<?php echo base_url()?>adminassets/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>adminassets/assets/javascripts/bootstrap3-typeahead.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?=base_url()?>opasset/js/moment.js"></script>
    <script type="text/javascript" src="<?=base_url()?>opasset/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>opasset/js/bootstrap-datetimepicker.ru.js"></script>
    <script src="<?php echo base_url()?>adminassets/dropzonejs/dropzonejs.js" type="text/javascript"></script>
 <link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>opasset/js/main/resources/css/jquery.toastmessage.css" />
 <script type="text/javascript" src="<?=base_url()?>opasset/js/main/javascript/jquery.toastmessage.js"></script>
 <script>
    function calTrig(id){
        document.getElementById(id).querySelector('input').addEventListener('click', function(){
            document.getElementById(id).querySelector('span').click()
        })  
    }
</script>
<script type="text/javascript">

      function showStickySuccessToast(text) {
        $().toastmessage('showToast', {
            text: text,
            sticky: true,
            inEffectDuration: 300, // in effect duration in miliseconds
            stayTime: 3000,
            position: 'top-left',
            type: 'success',
            closeText: '',
        });
    }
    function showSuperAdminToast(text) {
        $().toastmessage('showToast', {
            text: text,
            sticky: false,
            inEffectDuration: 300, // in effect duration in miliseconds
            stayTime: 3000,
            position: 'top-left',
            type: 'success',
            closeText: '',
        });
    }
</script>
<style type="text/css">
    .ic_b:before{
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        content: "\f0c7";
    }

</style>
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>

<?php 
$mid = $this->session->userdata('writer_id');
function createSuperNotice($colName, $manager_id){
  $s_mod = new Siteconfigs_model();
  $s_mod->db->select($colName);
  $s_mod->db->from('writers');
  $s_mod->db->where('writer_id', $manager_id);
  $mngr_notices = $s_mod->db->get();
  if($mngr_notices->num_rows() > 0){
    if(!empty($mngr_notices->row_array()[$colName])){
      $mngr_notices = explode (", ", substr ($mngr_notices->row_array()[$colName], 2));
    // echo '<pre>';
    // print_r($mngr_notices);
    // echo '</pre>'; 

    return array_unique($mngr_notices);
    } else {
      return false;
    }
  } else {
    return false;
  } 
}

$neworders = createSuperNotice('mngr_neworder', $mid);
$newUsers = createSuperNotice('mngr_newuser', $mid);
$newBidMes = createSuperNotice('mngr_new_order_bid', $mid);
$newFileMans = createSuperNotice('mngr_new_order_files', $mid);
$newWaitAccept = createSuperNotice('mngr_wait_accept', $mid);
$newChatMans = createSuperNotice('mngr_new_order_mes', $mid);
?>

      <div id="mWrp" class="massgeWrapper clearfix">
        <!-- //new order -->
      <div class="col-sm-4">  
        <div data-id="orders_neworder" class="neworders row" >
        Новые заказы:
        <span class="put_here">
          <?php if (is_array ($neworders)) { ?>
             <?php foreach ($neworders as $neworder) { ?>
             <span class="mesOrdWrap">  
                <a href="<?php echo ci_site_url('Adminorders/view_order/'.$neworder); ?>"><?php echo $neworder; ?></a>

                <form onsubmit="return false" style="display: inline">
                  <sup class="remNewOrderMes" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                  <input type="hidden" name="id" value="<?php echo $neworder; ?>">
                  <input type="hidden" name="colName" value="mngr_neworder">
                </form>  
              </span>  
              <?php } ?>
            <?php } ?>
          </span>
          </div>  
          <!-- //newWriter -->
        <div data-id="orders_newmember" class="neworders row">
        Новые Пользователи:
        <span class="put_here">
        <?php if (is_array ($newUsers)) { ?>
           <?php foreach ($newUsers as $newuser) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('Adminwriters/view_writer/'.$newuser); ?>"><?php echo $newuser; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewUsr" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="id" value="<?php echo $newuser; ?>">
                <input type="hidden" name="colName" value="mngr_newuser">
              </form>  
            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div>  




          <!-- $newWaitAccept -->
</div>
<div class="col-sm-4 midneword_wrap">
<!-- // order bid or refreshed bid -->
        <div data-id="orders_auctsion" class="neworders row midneword" >
        Ставки по заказам:
        <span class="put_here">
        <?php if (is_array ($newBidMes)) { ?>
           <?php foreach ($newBidMes as $newBid) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('Adminorders/view_order/'.$newBid); ?>"><?php echo $newBid; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewBid" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="id" value="<?php echo $newBid; ?>">
                <input type="hidden" name="colName" value="mngr_new_order_bid">
              </form>  

            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div>  

<!-- // file added to order -->
        <div data-id="orders_files" class="neworders row midneword" >
        Файлы по заказам:
        <span class="put_here">
        <?php if (!empty($newFileMans)) { ?>
           <?php foreach ($newFileMans as $newFile) { ?>

           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('Adminorders/view_order/'.$newFile); ?>"><?php echo $newFile; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewFile" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="id" value="<?php echo $newFile; ?>">
                <input type="hidden" name="colName" value="mngr_new_order_files">
              </form>  

            </span>  

            <?php } ?>
          <?php } ?>
          </span>
          </div>  
</div>
<div class="col-sm-4"> 
<!-- chat new messages -->
        <div data-id="orders_chat" class="neworders row pull-right" >
        Сообщения по заказам:
        <span class="put_here">
 <?php if (!empty($newChatMans)) { ?>
           <?php foreach ($newChatMans as $newChat) { ?>
           <span class="mesOrdWrap">  
              <a class="ordMesLinkPush" href="<?php echo ci_site_url('Adminorders/view_order/'.$newChat); ?>">

                <?php echo explode('#', $newChat)[0]; ?> 

                <span class="mes_who_top_push">
                   <?php if(explode('#', $newChat)[1] === 'zakaz') {
                       echo "З";
                     } elseif(explode('#', $newChat)[1] === 'avtor') {
                       echo "А";
                     } elseif(explode('#', $newChat)[1] === 'a_z') {
                       echo "АЗ";
                     } elseif(explode('#', $newChat)[1] === 'z_a') {
                       echo "ЗА";
                     }?>
                </span> 
                  
              </a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remViewChat" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="id" value="<?php echo $newChat; ?>">
                <input type="hidden" name="colName" value="mngr_new_order_mes">
              </form>  

            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div>  
                  <div data-id="orders_to_assign" class="neworders row">
        Заказы на подтверждении:
        <span class="put_here">
        <?php if (is_array ($newWaitAccept)) { ?>
           <?php foreach ($newWaitAccept as $newWait) { ?>
           <span class="mesOrdWrap">  
              <a href="<?php echo ci_site_url('Adminorders/view_order/'.$newWait); ?>"><?php echo $newWait; ?></a>

              <form onsubmit="return false" style="display: inline">
                <sup class="remWaitUsr" style="font-size: 13px; color: red; cursor: pointer">x</sup>,
                <input type="hidden" name="id" value="<?php echo $newWait; ?>">
                <input type="hidden" name="colName" value="mngr_wait_accept">
              </form>  
            </span>  
            <?php } ?>
          <?php } ?>
          </span>
          </div> 




</div>

      </div>
<!-- ====================== -->

      <ul class='nav navbar-nav pull-right' style="margin-top: -7px;">
        <?php if($this->session->userdata('admin_level') === 'super'){ ?>
        <li>
          <a href='<?php echo ci_site_url(); ?>siteconfigs/configs'>
            <i class='fa fa-cog'></i>
            Настройки
          </a>
        </li>
      <?php } ?>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='fa fa-user'></i>
            <strong><?php echo $this->session->userdata('firstname')?>  <?php echo $this->session->userdata('lastname')?></strong>
            <img class="img-rounded" src="<?php echo base_url()?>adminassets/images/avatar-male.jpg"/>
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <?php 
$receiverid = $this->session->userdata('writer_id');   
$this->db->where(array('msg_type' => 'message', 'receiverid' => $receiverid, 'msg_read' =>0));
$newemails = $this->db->count_all_results('messages');  ?>
            <li>
              <a href='<?php echo ci_site_url(); ?>Adminwriters/view_writer/<?php echo $this->session->userdata('writer_id');?>'>Изменить профиль</a>
            </li>
            <li class='divider'></li>
            <!-- <li>
              <a href='<?php // echo ci_site_url(); ?>adminmsg/inbox'>Сообщения <span class='badge'><?php // echo $newemails; ?></span></a>
            </li> -->
            <li>
              <a href="<?php echo ci_site_url(); ?>opadmin/logout">Выход</a>
            </li>
          </ul>
        </li>
      </ul>
<!-- ====================== -->

<script type="text/javascript">

    $(document).ready(function() {
        function toRem(nodeToRemove){
          nodeToRemove.remove();
        }
      function ajRemMessage(clName, CtrlFunc){
        $(document).on('click', clName, function(form){
              // console.log($(form).serialize());
              var ftar = form.target.parentElement;
              // console.log(ftar);

              if(oldNotice != undefined){
                  var tempArr
                  var noticeBlockKey = form.target.parentElement.parentElement.parentElement.parentElement.getAttribute('data-id');
                  var noticeValue;
                  noticeValue = form.target.parentElement.querySelector('input[name=id]').value; 

                  for(key in oldNotice[noticeBlockKey]) {
                    tempArr = oldNotice[noticeBlockKey][key].split(', ');
                    tempArr.splice(tempArr.indexOf(noticeValue), tempArr.indexOf(noticeValue)+1);
                    oldNotice[noticeBlockKey][key] = tempArr.join(', ');
                  }


                  console.log(oldNotice);

              }



               $.post('<?php echo ci_site_url(); ?>Adminwriters/'+ CtrlFunc, $(ftar).serialize(), function(data){
                toRem(form.target.parentElement.parentElement)
               });
        });
      }
      
      ajRemMessage('sup.remNewOrderMes', 'mngrDeleteNotice');
      ajRemMessage('sup.remViewUsr', 'mngrDeleteNotice');
      ajRemMessage('sup.remWaitUsr', 'mngrDeleteNotice');
      ajRemMessage('sup.remViewBid', 'mngrDeleteNotice');
      ajRemMessage('sup.remViewFile', 'mngrDeleteNotice');
      ajRemMessage('sup.remViewChat', 'mngrDeleteNotice');
//remWaitUsr
});
</script>
    </div>
    
    <div id='wrapper'>

      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='fa fa-align-justify fa-large' id='toggle'></i>
        <ul id='dock'>
           
  <?php if($this->session->userdata('admin_level') === 'super'){ ?>
          <li class='launcher'>
            <i class="fa fa-font" aria-hidden="true"></i>
            <a href="<?php echo ci_site_url(); ?>Adminorders/superAdmin">Супер Админ</a>
          </li>
<?php   } else { ?>
          <li class='launcher'>
            <i class="fa fa-address-book-o" aria-hidden="true"></i>
            <a href="<?php echo ci_site_url(); ?>Adminwriters/view_writer/<?php echo $this->session->userdata('writer_id'); ?>">Мой профиль</a>
          </li>
<?php } ?> 

<?php 

if($this->session->userdata('admin_level') === 'super'){

    $this->db->select('writer_id');
    $this->db->from('writers');
    $this->db->where('writer_level', 'admin');
    $managers = $this->db->get()->result_array();
    $man_ids = array();

    foreach ($managers as $m) {
        foreach ($m as $m1) {
            array_push($man_ids, $m1);
        }
    }
}

  if($this->session->userdata('admin_level') != 'super'){
    $this->db->where('msg_type="message" AND (receiverid="0" OR receiverid="'.$this->session->userdata('writer_id').'") AND msg_read="0"');
  } else {
    $this->db->where_not_in('senderid', $man_ids);
    $this->db->where("msg_read='0'");
  }


$nom = $this->db->count_all_results('messages');

?>
          <li class='launcher'>
            <i class="fa fa-tachometer"></i>
            <a href="<?php echo ci_site_url(); ?>opmaster/dashboard">Панель</a>
          </li><br>
          <li class='launcher'>
            <i class='fa fa-file-text'></i>
            <a href="<?php echo ci_site_url(); ?>Adminorders/iorders">Заказы</a>
          </li><br>
          <li class='launcher'>
            <i class='fa fa-user-circle-o'></i>
            <a href="<?php echo ci_site_url(); ?>Adminwriters/writers">Авторы</a>
          </li><br>
          <li class='launcher'>
            <i class='fa fa-user-circle'></i>
            <a href="<?php echo ci_site_url(); ?>Adminclients/clients">Заказчики</a>
          </li><br>
           <li class='launcher' style="position: relative;">
            <i class='fa fa-envelope'></i><div class="nofmes" id="lan"><?php echo $nom; ?></div>
            <a href='<?php  echo ci_site_url(); ?>adminmsg/inbox'>Сообщения и письма </a>
          </li> <br>        
          <?php if($this->session->userdata('admin_level') === 'super'){ ?>
            <li class='launcher'>
              <i class='fa fa-envelope-o'></i>
              <a href='<?php echo ci_site_url(); ?>siteconfigs/messages'>Конфигурация писем</a>
            </li><br>
            <?php } ?>
          <li class='launcher'>
            <i class='fa fa-power-off'></i>
            <a href='<?php echo ci_site_url(); ?>opadmin/logout'>Выйти из кабинета</a>
          </li>
        </ul>
        <div data-toggle='tooltip' id='beaker' title='Made by lab2023'></div>
      </section>

      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Панель</li>

        </ul>
   
<script type="text/javascript">
function onlyUnique(value, index, self) {return self.indexOf(value) === index;}


  function dgi(id){return document.getElementById(id)}
  var topNoticeBlock = dgi('mWrp');
  var techChat, oldNotice, orderChat;
/*      setInterval(function(){ 
      $('#lan').load(window.location.href + " #lan"); 
      $('#mWrp').load(window.location.href + " #mWrp");

      if(document.getElementById('badge_id')!=null){
        $('#badge_id').load(window.location.href + " #badge_id")    
        // document.getElementById('badge_id') = document.getElementById('mWrp').innerHTML            
      }
    
    }, 20000);
*/

function createNoticeTemplate(id, supClass, colName, linkPart){
  var html;
  if(supClass != 'remViewChat'){
    html = '<span class="mesOrdWrap">';
    html += '<a href="<?php echo ci_site_url(); ?>'+ linkPart + id +'">'+id+'</a>';
    html +=   '<form onsubmit="return false" style="display: inline">&nbsp;';
    html +=     '<sup class="'+supClass+'" style="font-size: 13px; color: red; cursor: pointer">x</sup>,&nbsp;';
    html +=      '<input type="hidden" name="id" value="'+id+'">';
    html +=      '<input type="hidden" name="colName" value="'+colName+'">';
    html +=    '</form>' ; 
    html += '</span>';
  } else {
    var chatNotice = id.split('#'), fh;
    switch(chatNotice[1]){
      case 'a_z': fh = 'АЗ'; break;
      case 'z_a' : fh = 'ЗА'; break;
      case 'avtor' : fh = 'А'; break;
      case 'zakaz' : fh = 'З'; break;
      // case 'admin' : fh = 'Адм'; break;
      // default : fh = 'АЗ'; break;
    }

    html =   '<span class="mesOrdWrap">';  
    html +=   '<a class="ordMesLinkPush" ';
    html +=   'href="<?php echo ci_site_url(); ?>'+ linkPart + id +'">';
    html +=    chatNotice[0];
    html +=     '<span class="mes_who_top_push">'+fh+'</span></a>';
    html +=      '<form onsubmit="return false" style="display: inline">&nbsp;';
    html +=       '<sup class="'+supClass+'" style="font-size: 13px; color: red; cursor: pointer">x</sup>,&nbsp;';
    html +=         '<input type="hidden" name="id" value="'+id+'">';
    html +=         '<input type="hidden" name="colName" value="'+colName+'">';
    html +=      '</form>';
    html +=   '</span>';

  }


  return html;

}
function putNoticeTemplate(notices, putBlock){
  var supClass, colName, linkPart,  tpl = '';
  // console.log(putBlock+' '+notices);
  switch (putBlock) {
    case 'orders_neworder': supClass = 'remNewOrderMes'; colName = 'mngr_neworder'; linkPart = 'Adminorders/view_order/'; break;
    case 'orders_newmember': supClass = 'remViewUsr'; colName = 'mngr_newuser'; linkPart = 'Adminwriters/view_writer/'; break;
    case 'orders_auctsion': supClass = 'remViewBid'; colName = 'mngr_new_order_bid'; linkPart = 'Adminorders/view_order/'; break;
    case 'orders_files': supClass = 'remViewFile'; colName = 'remViewFile'; linkPart = 'Adminorders/view_order/'; break; 
    case 'orders_chat': supClass = 'remViewChat'; colName = 'mngr_new_order_mes'; linkPart = 'Adminorders/view_order/'; break;   
    case 'orders_to_assign': supClass = 'remWaitUsr'; colName = 'mngr_wait_accept'; linkPart = 'Adminorders/view_order/'; break;    
  }
  for(let i = 0; i <= notices.length-1; i++){
   tpl += createNoticeTemplate(notices[i], supClass, colName, linkPart);
  }
  topNoticeBlock.querySelector('div[data-id='+key+'] span.put_here').innerHTML = tpl;
}


function putTechMessage(content){
  var fh;
  if(!techChat){techChat = 0} 
  for(var i = 0; i <= content.length-1; i++){
    if(techChat < content[i]['id']){
        addYourMessage(content[i]['msg_title'], content[i]['msg_body'], 'client', content[i]['msg_date'], 'from_client', 'message', content[i]['id'], content[i]['senderid']);
        //mesSbj, mesBody, user_level, mesDate, fromWho, whom
      }
  }
  techChat = content[content.length-1]['id'];
  console.log(techChat);
}


function putChatMessage(content){
  // console.log(content);
  var fh, chatHistory, whom;
  if(!orderChat){orderChat = 0}
    iter:for(var i = 0; i <= content.length-1; i++){

      if(orderChat < content[i]['id']){

        sw:switch (content[i]['from_who']){
          case 'zakaz': fh = 'client'; chatHistory = '#refresh'; break sw; 
          // case 'manager' : fh = 'manager'; chatHistory = '#refresh_mngr_chat'; break sw;
          // case 'admin' : fh = 'admin';  chatHistory = '#refreshAvtor'; break sw;
          case 'avtor' : fh = 'writer'; chatHistory = '#refreshAvtor'; break sw;
        }
        sw2:switch(content[i]['whom']){
          case 'zakaz' : whom = 'client'; break sw2;
          case 'manager' : whom = 'manager'; break sw2;
          case 'admin' : whom = 'admin'; break sw2;
          case 'avtor' : whom = 'writer'; break sw2;            
        }

        addYourMessage(content[i]['message_body'], fh, content[i]['approval'], chatHistory, whom, '', content[i]['id']);
        // mesBody, user_level, mesDate, chatHistory, whom, fileTpl, mesId
        fh = chatHistory = whom = '';
      }

    }
    orderChat = content[content.length-1]['id'];
    // console.log(orderChat);

}



        function noticeChecker() {

          var arrContainUrl = window.location.href.split('/');
          // console.log(arrContainUrl.indexOf('sup_chat'));
              
           var sendCont =  'writer_id=<?php echo $this->session->userdata("writer_id"); ?>' +'&url='+ window.location.href;


           
           if(arrContainUrl.indexOf('sup_chat') > -1){

             var dateMsgArr = document.querySelectorAll('.date span');
              if(dateMsgArr.length != 0){
               var dateMsg = dateMsgArr[dateMsgArr.length-1].innerText;
               if(dateMsg != undefined){
                  sendCont += '&techLastDate='+dateMsg;
               }
              }  
            } 

            $.post('<?php  echo ci_site_url(); ?>writersed/notice_checker', sendCont, function(data){
                data = JSON.parse(data);
                if(oldNotice === undefined){
                  oldNotice = data;
                  return false;
                }

                for(key in data){
                  if(key === 'nom' && data[key] != oldNotice[key]){
                    console.log(key +'-'+data[key]);
                    console.log(oldNotice[key])
                    dgi('lan').innerHTML = data[key];
                    if(dgi('badge_id') != null){dgi('badge_id').innerHTML = data[key]}
                  } else if(key === 'techChat' && data[key] != ''){
                      putTechMessage(data[key]);
                  } else if (key === 'mngrUserChat' && data[key] != ''){
                    putChatMessage(data[key]);
                  } else {
                   for(k in data[key]) {
                    if(data[key][k] != oldNotice[key][k]){
                        if(data[key][k] != ''){
                          console.log(data[key][k].split(', ').slice(1).filter(onlyUnique));
                            putNoticeTemplate(data[key][k].split(', ').slice(1).filter(onlyUnique), key);
                        }
                    } 
                  } 
                }
 


                }
                oldNotice = data;
                // console.log(oldNotice);


              }
            );
           

        }

setInterval(noticeChecker, 20000);

document.onload = function(){
  noticeChecker();
  
}


</script>
      </section>