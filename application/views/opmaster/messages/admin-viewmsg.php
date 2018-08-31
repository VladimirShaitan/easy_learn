<style type="text/css">
 .reply_mes_holder_sup.from_client .delMes{
    float: left;
    margin-right: 10px;
    margin-left: 0; 
 }
 .reply_mes_holder_sup .delMes{
    float: right;
    margin-left: 10px;
 }
</style>
  <?php 
    $wh = '';
    if($client['user_level'] === 'client') {
      $wh = 'Заказчика';
    } elseif ($client['user_level'] === 'writer') {
      $wh = 'Автора';
    }
  ?>

<div class="col-md-10">
  <div class='panel panel-default grid'>
    <div class="fre-conversation-list">

          <h3>
            Чат с пользователем <a href="<?php echo site_url('in/Adminwriters/view_writer/'.$client['writer_id']); ?>">#<?php echo $client['writer_id']; ?></a>
          </h3>
          <hr/>
          <div class="history">
            <div id="refreshTechMan">          
                <?php foreach ($messages as $sup_history_mes): ?>
                  <?php if($sup_history_mes['msg_type'] === 'reply') { ?>
                    <!-- $sup_history_mes['senderid'] === $this->session->userdata('writer_id') || $sup_history_mes['senderid'] === '2562' -->
                    <div class="reply_mes_holder_sup">
                      <h4>
<?php if($this->session->userdata('admin_level') === 'super') { ?>
                      <form class="mid-<?php echo $sup_history_mes['id'];?>" onclick="return false">
                          <input type="hidden" name="id" value="<?php  echo $sup_history_mes['id'];?>">
                          <button type='submit' class="delMes btn btn-danger"></button>
                          <!-- <span class="spLoader"><i class="fa fa-spinner"></i></span> -->
                      </form>
<?php } ?>

                        Ответ <?php if($sup_history_mes['senderid'] === '2562'){echo '<span class="fr_adm_mes mng_mes" style="background:red">Администратора</span>';} else { echo '<span class="fr_adm_mes mng_mes">менеджера</span>'; } ?> <?php if(!empty($sup_history_mes['msg_title'])) { echo '| '.stripslashes($sup_history_mes['msg_title']); } ?></h4>
                      <div class="date">Дата отправки: <span><?php echo $sup_history_mes['msg_date']; ?></span></div>
                      <h5 style="margin-top: 0"><b>Сообщение:</b></h5>
                      <div class="megBody"><?php echo stripslashes($sup_history_mes['msg_body']); ?></div>
                    </div>
                  <?php } else { ?>
                    <div class="reply_mes_holder_sup from_client">
                      <h4>

<?php if($this->session->userdata('admin_level') === 'super') { ?>
                        <form class="mid-<?php echo $sup_history_mes['id'];?>" onclick="return false">
                          <input type="hidden" name="id" value="<?php  echo $sup_history_mes['id'];?>">
                          <button type='submit' class="delMes btn btn-danger"></button>
                        </form>
<?php } ?>

                        От <?php if($sup_history_mes['from_who'] === 'client' && $sup_history_mes['msg_type'] === 'message') {echo 'Заказчика';} elseif($sup_history_mes['from_who'] === 'writer' && $sup_history_mes['msg_type'] === 'message') {echo 'Автора';} ?>  <span class="fr_adm_mes mng_mes">менеджеру</span><?php if(!empty($sup_history_mes['msg_title'])) { echo '| '.stripslashes($sup_history_mes['msg_title']); } ?></h4>
                      <div class="date">Дата отправки: <span><?php echo $sup_history_mes['msg_date']; ?></span></div>
                      <h5 style="margin-top: 0"><b>Сообщение:</b></h5>
                      <div class="megBody"><?php echo stripslashes($sup_history_mes['msg_body']); ?></div>
                    </div>
                  <?php } ?>
                <?php endforeach; ?>
                <div id="ancBot"></div>
            </div>
           </div>   
      <hr>

      <form onsubmit="return false">
        <div class="clearfix sup_form_holder">  
          <div class='jsError'></div>
          <div class="form-group">
            <input class="form-control" type="text" name="msg_title" id="sbj" placeholder="Тема">
            <br>
            <textarea class="form-control" id="sup_mes_body" placeholder="Ответ" style="width: 100%" rows="5" name="msg_body"></textarea>
            <input type='hidden' name='receiver_id' value="<?php echo $client['writer_id']; ?>" readonly>
            <input type='hidden' name='receiver_name' value="<?php echo $client['firstname'].' '.$client['lastname']; ?>" readonly>
            <input type="hidden" name='sender_id' value="<?php echo $this->session->userdata('writer_id'); ?>" readonly/>
            <input type="hidden" name='sender_name' value="<?php echo $this->session->userdata('firstname'). ' ' .$this->session->userdata('lastname');?>" readonly />
            <!-- <input type="hidden" name="msg_date" value="<?php // echo date('d.m.Y H:i:s');?>"> -->
            <br>
            <button class="btn btn-success sent_sup_reply" type="submit" id="submitComment">Отправить</button>
          </div>
        </div>
      </form>
    </div>

        </div>

          </div>
 </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
String.prototype.stripSlashes = function()
{return this.replace(/\\(.?)/g, function (s, n1){switch (n1){case '\\':return '\\';case '0':return '\u0000';case '':return '';default:return n1;}});};

function addYourMessage(mesSbj, mesBody, user_level, mesDate, fromWho, whom, id, senderid){
  var html, usr_lvl, mS, mB, wh;

  var userId = '<?php echo $client['writer_id']; ?>';
  
  if(userId != senderid ){
    user_level = 'manager';
    console.log(senderid);
    if( (senderid === undefined && '<?php echo $this->session->userdata("admin_level"); ?>' === 'super') || senderid === '2562'){
      user_level = 'admin';
    }
    fromWho = '';
    whom = 'reply';
  }

  if(user_level === 'writer'){usr_lvl = 'менеджеру';} 
  else if(user_level === 'client'){usr_lvl = 'менеджеру';} 
  else if(user_level === 'manager'){usr_lvl = 'менеджера';} 
  else if(user_level === 'admin'){usr_lvl = 'Администратора';} 

  
  

  switch(whom){
    case 'reply': wh = "Ответ"; break;
    case 'message': wh = "От <?php echo $wh; ?>"; break;
  }

  // console.log(mesSbj);
  if(dgi(mesSbj)!=null){
   mS = dgi(mesSbj).value;
  } else{
    mS = mesSbj;
  }

  if(dgi(mesBody)!=null){
    mB = dgi(mesBody).value;
  } else{
    mB = mesBody;
  }


  html = '<h4>';

<?php if($this->session->userdata('admin_level') === 'super') { ?>
  html += '<form class="mid-'+id+'" onclick="return false">';
  html += '<input type="hidden" name="id" value="'+id+'">';
  html += '<button type="submit" class="delMes btn btn-danger"></button>';
  html +='</form>';
 <?php } ?> 

  html += wh+' <span class="fr_adm_mes mng_mes" style="background:red">'+usr_lvl+'</span> | '+mS.stripSlashes()+' </h4>'  ;
  html +=   '<div class="date">Дата отправки: <span>'+mesDate+'</span></div>';
  html +=    '<h5 style="margin-top: 0"><b>Сообщение:</b></h5>';
  html +=     '<div class="megBody">'+mB.stripSlashes()+'</div>';

  var div = document.createElement('div');
  div.className = 'reply_mes_holder_sup '+fromWho;
  div.innerHTML = html;

  // console.log(dgi('refreshTechMan'));
  dgi('refreshTechMan').appendChild(div);
}



function ajax_send_message(btnSend, mesBody, refBlockId, refBlockWrapClName, sbjBody){
    $(btnSend).on('click',
      function(form){
      let messageBody = document.getElementById(mesBody).value;
      var ftar = form.target.parentElement.parentElement.parentElement;
      // console.log(ftar);
       $.post('<?php echo ci_site_url(); ?>Messages/message_reply_new', $(ftar).serialize(), function(data){
          // $(refBlockId).load(window.location.href + " " + refBlockId);
          data = JSON.parse(data);
          

          var fh = '<?php echo $this->session->userdata('admin_level'); ?>'
          switch (fh){
            case 'super': fh = 'admin'; break; 
            default : fh = 'manager'; break;  
          }
          addYourMessage(sbjBody, mesBody, fh, data, '', 'reply');  
          document.getElementById(mesBody).value = '';
          noticeChecker();
          $(refBlockWrapClName).scrollTop($(refBlockId).height()+ 120);
          
       });

      }
      );
    // setInterval(function(){ 
    //   $(refBlockId).load(window.location.href + " " + refBlockId); 
    // }, 5000);
}

ajax_send_message('button.sent_sup_reply', 'sup_mes_body', '#refreshTechMan', '.history', 'sbj');




function deleteTechMessage(trashFormSubm, refBlockId, callFunc){ 
    $(trashFormSubm).on('click',
    function(form){
      var ftar = form.target.parentElement;
      ftar.onsubmit = () => {return false};
       $.post('<?php echo ci_site_url(); ?>Messages/deleteTechMessage', $(ftar).serialize()) 
         .done(function(data){
          data = JSON.parse(data);
          console.log(data);
          form.target.parentElement.parentElement.parentElement.remove();
          noticeChecker();
     });

    });
}

deleteTechMessage('.history');



</script>

  </body>
</html>








