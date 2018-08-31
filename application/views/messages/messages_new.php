<div class="col-md-8 private-message-reply-contents" style ="display:block">


<style type="text/css">
  .text-center.blocked_user {
    color: white;
    background: red;
    font-size: 17px;
    font-weight: bold;
    padding: 10px;
    margin-bottom: 10px;
}
</style>
<div class="blocked_usr"></div>
<script>
   if (window.location.href.indexOf("#blocked") > -1){
      let blockMes = 'Внимание! Ваш аккаунт был заблокирован обратитесь в тех. поддержку';
      let blockWrap = document.getElementsByClassName("blocked_usr")[0];
      let blockMesWrap = document.createElement('div');
      blockMesWrap.classList.add('text-center', 'blocked_user');
      blockMesWrap.innerHTML = blockMes;
      blockWrap.appendChild(blockMesWrap);
      alert(blockMes);
   } 
</script>
<div class='jsError'></div>
<h2 style="margin: 0; padding: 0">Вопросы в техподдержку</h2>

<hr>
<div class="history">
  <div id="refresh_tech">
    <div class="history_wrapper_in" style="position: relative;">        
      <?php foreach (array_reverse($messages) as $single_mes) { ?>
          <?php if($single_mes['senderid'] != $this->session->userdata('writer_id')) { ?>
          <div class="mes_wrapper manager m-sup-id-<?php echo $single_mes['id'] ?>">
            <div class="heading">
              <?php if($this->session->userdata('user_level') === 'writer'){ ?>
                Автору <!-- <span class="fr_adm_mes mng_mes">от Автора</span> -->
              <?php } elseif($this->session->userdata('user_level') === 'client') { ?>
                Заказчику  
              <?php } else { ?>
                Вам
              <?php } ?>
              <?php if($single_mes['senderid'] === '2562'){ ?>
                <span class="adm_mes">от Администратора</span>
              <?php } else { ?>
               <span class="mng_mes">от Менеджера</span>
             <?php } ?>
            </div>
            <div class="date">Дата: <?php echo $single_mes['msg_date']; ?></div>
            <?php if(!empty($single_mes['msg_title'])) { ?>
              <div class="subj"><b>Тема: <?php echo stripslashes($single_mes['msg_title']); ?></b></div>
            <?php } ?>   
            <div class="message_sup_body">
              <?php echo stripslashes($single_mes['msg_body']); ?>
            </div>
          </div>
          <?php } else { ?>
            <div class="mes_wrapper meToSup m-sup-id-<?php echo $single_mes['id'] ?>">
            <div class="heading">Менеджеру
              <?php if($this->session->userdata('user_level') === 'writer'){ ?>
                <span class="fr_adm_mes mng_mes"> от автора </span>
              <?php } elseif($this->session->userdata('user_level') === 'client') { ?>
               <span class="fr_adm_mes mng_mes"> от заказчика  </span>
              <?php } else { ?>
                <span class="fr_adm_mes mng_mes"> от вас </span>
              <?php } ?>
          </div>
            <div class="date">Дата: <?php echo $single_mes['msg_date']; ?></div>
            <?php if(!empty($single_mes['msg_title'])) { ?>
              <div class="subj"><b>Тема: <?php echo stripslashes($single_mes['msg_title']); ?></b></div>
            <?php } ?>  
            <div class="message_sup_body">
              <?php echo stripslashes($single_mes['msg_body']); ?>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
        <div id="ancBot"></div>
    </div>
  </div>
</div>
<hr>
<form onsubmit="return false">
    <input type='input' id="sbj" placeholder="Тема" class="form-control" name='msg_title' value="">
    <br>
    <textarea required  rows="5" placeholder="Сообщение" name="msg_body" id="tech_mes_body" style="width: 100%"></textarea>

    <input type="hidden" class="form-control" name='senderid' value = "<?php echo $this->session->userdata('writer_id')?>" />
    <input type="hidden" name="from-who" value="<?php echo $this->session->userdata('user_level'); ?>">
    <input type="hidden" class="form-control" name='sender_name' value = "<?php echo $this->session->userdata('firstname')?> <?php echo $this->session->userdata('lastname')?>" />
<br>
    <button class="btn btn-success send_tech_mes" type="submit">Отправить</button>
</form>



</div>


<script type="text/javascript">
String.prototype.stripSlashes = function()
{return this.replace(/\\(.?)/g, function (s, n1){switch (n1){case '\\':return '\\';case '0':return '\u0000';case '':return '';default:return n1;}});};

function dgi(id){return document.getElementById(id);}
function addYourMessage(mesSbj, mesBody, user_level, mesDate, mesId, fromWho, fhBlok, whom){
  var html, usr_lvl, mS, mB, wh;
  if(user_level === 'writer'){usr_lvl = 'от автора';} 
  else if(user_level === 'client'){usr_lvl = 'от заказчика';} 
  else if(user_level === 'manager'){usr_lvl = 'от менеджера';} 
  else if(user_level === 'admin'){usr_lvl = 'от администратора';} 
  
  switch(whom){
    case 'writer': wh = "Автору"; break;
    case 'client': wh = "Заказчику"; break;
    case 'manager': wh = "Менеджеру"; break;
    case 'admin':   wh = "Администратору"; break;
     }

  console.log(mesSbj);
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


  html =  '<div class="heading">'+wh;
  html +=    '<span class="'+fhBlok+'">'+usr_lvl+'</span>';
  html +=  '</div>';
  html +=   '<div class="date">Дата: '+mesDate+'</div>';
  if(mS!=''){
    html +=  '<div class="subj"><b>Тема: '+mS.stripSlashes()+'</b></div>';
  }
  html += '<div class="message_sup_body">';
  html +=   mB.stripSlashes();
  html +=  '</div>';
  var div = document.createElement('div');
  div.className = 'mes_wrapper '+fromWho+' m-sup-id-'+mesId;
  div.innerHTML = html;
  console.log(document.querySelector('#refresh_tech .history_wrapper_in'));
  document.querySelector('#refresh_tech .history_wrapper_in').appendChild(div);
}

function ajax_send_message(btnSend, mesBody, refBlockId, refBlockWrapClName, sbjBody){
    $(btnSend).on('click',
      function(form){
      let messageBody = document.getElementById(mesBody).value;
      var ftar = form.target.parentElement;
       $.post('<?php echo ci_site_url(); ?>Messages/message_submit_new', $(ftar).serialize(), function(data){
          data = JSON.parse(data);
          // console.log(data);
          addYourMessage(sbjBody, mesBody, '<?php echo $this->session->userdata('user_level'); ?>', data['date'], data['id'], 'meToSup', 'fr_adm_mes mng_mes', 'manager');


          // oldNotice['supportChat'] = data['id'];
          console.log(oldNotice);
          document.getElementById(mesBody).value = '';
          document.getElementById(sbjBody).value = '';
          $(refBlockWrapClName).scrollTop($(refBlockId).height()+ 120);
       });

      }
      );
    // setInterval(function(){ 
    //   $(refBlockId).load(window.location.href + " " + refBlockId); 
    // }, 5000);
}

ajax_send_message('button.send_tech_mes', 'tech_mes_body', '#refresh_tech', '.history', 'sbj');

function repl(str){
  let a = '';
  for(let i = 0; i <= str.length-1; i++){
    if(str[i] === '\\'){
      a += ''
    } else {
      a+= str[i];
    }
  }
  return a;
}



setTimeout(function(){
  $('.history').animate({
      scrollTop: $("#ancBot").offset().top
  }, 100);

}, 500);
</script>